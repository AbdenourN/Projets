<?php class Model {

	private $bd;
	private static $instance = null;
	private $username ;
	private $pswd;
	private $role;
	

	private function __construct($username, $pswd)
	{
		// Complexité algorithmique : O(1), c'est constant	
		$this->bd = mysqli_connect("localhost", "webuser", "password","sae");
		$this->bd->set_charset("utf8mb4");
		$this->username=$username;
		$this->pswd=$pswd;
	}
	public function verifpswd($mdp)
	{
		// Complexité algorithmique : O(n), car un SELECT est en réalité une boucle .
		$req = $this->bd->prepare("SELECT Password FROM login WHERE Username=?");
		$req->bind_param("s",$this->username);
		$req->execute();
		$res=$req->get_result();
		$res = $res->fetch_assoc();

		return  password_verify($mdp,$res["Password"]);		;
	}

	public function getMail()
	{
		if($this->getRole()==0)
		{
			// Complexité algorithmique : O(n²), car un SELECT est en réalité une boucle donc une jointure est une boucle imbriqué.
			$req=$this->bd->prepare("SELECT p.Mail FROM login JOIN personnel as p WHERE User_ID=? AND p.Personnel_ID=?;");
			$l=$this->getUserid();
			$req->bind_param("ii",$l,$l);
			$req->execute();
			$res=$req->get_result();
			$res = $res->fetch_assoc();
			return $res["Mail"];
		}
		else
		{
			$req=$this->bd->prepare("SELECT p.Mail FROM login JOIN etudiant as p WHERE User_ID=? AND p.Student_ID=?;");
			$l=$this->getUserid();
			$req->bind_param("ii",$l,$l);
			$req->execute();
			$res=$req->get_result();
			$res = $res->fetch_assoc();
			return $res["Mail"];
		}
	}
	public function getUserid()
	{
		// Complexité algorithmique : O(n), car un SELECT est en réalité une boucle .
		$req = $this->bd->prepare("SELECT User_ID FROM login WHERE Username=?");
		$req->bind_param("s",$this->username);
		$req->execute();
		$res=$req->get_result();
		$res = $res->fetch_assoc();
		return $res["User_ID"];
	}

	public static function getModel($username, $pswd)
	{
		// Complexité algorithmique : O(1), c'est constant
		if (self::$instance === null) {
		self::$instance = new self($username, $pswd);
			}	
		return self::$instance;
	}
	
	public function isconnected()
	{
		// Complexité algorithmique : O(n), car un SELECT est en réalité une boucle .
		$req = $this->bd->prepare("SELECT Password FROM login WHERE Username=?");
		$req->bind_param("s",$this->username);
		$req->execute();
		$res=$req->get_result();
		$res = $res->fetch_assoc();

		return password_verify($this->pswd,$res["Password"]);

	}

	public function getPersonnelInformation($id)
	{
		// Complexité algorithmique : O(n), car un SELECT est en réalité une boucle .
		$req = mysqli_query($this->bd,'Select * from personnel WHERE Personnel_ID = '.$id);
		return mysqli_fetch_array($req);
	}

	public function getFormationInformation($id)
	{
		// Complexité algorithmique : O(n), car un SELECT est en réalité une boucle .
		$req = mysqli_query($this->bd,'Select * from formation WHERE Formation_ID = '.$id);
		return mysqli_fetch_array($req);
	}

	public function close_co()	
	{// Complexité algorithmique : O(1), C'est constant .
		mysqli_close($this->bd);
	}

	public function getUserinfo()
	{
		// Complexité algorithmique : O(n), car un SELECT est en réalité une boucle .
		$req = $this->bd->prepare("SELECT * FROM login WHERE Username=?;");
		$req->bind_param("s",$this->username);
		$req->execute();
		$res=$req->get_result();
		$res = $res->fetch_assoc();
		$this->role=$res["Role"];

		if ($res["Role"] == false)
		{
			$req = $this->bd->prepare("SELECT * FROM personnel WHERE Personnel_ID=?;");
			$req->bind_param("i",$res["User_ID"]);
			$req->execute();
			$res=$req->get_result();
			$res = $res->fetch_assoc();
		}

		return $res;
	}
	public function getRole()
	{
		// Complexité algorithmique : O(n), car un SELECT est en réalité une boucle .
		$req = $this->bd->prepare("SELECT Role FROM login WHERE Username=?");
		$req->bind_param("s",$this->username);
		$req->execute();
		$res=$req->get_result();
		$res = $res->fetch_assoc();

		return $res["Role"];
	}

	public function setco($state)
	{

		// Changer la BDD
		// Complexité Algorithmique : O(Log(n)) 
		if ($state)
		{
			$req = $this->bd->prepare("UPDATE login SET Connected=true WHERE Username=?");
		}
		else
		{
			$req = $this->bd->prepare("UPDATE login SET Connected=False WHERE Username=?");
		}

		$req->bind_param("s",$this->username);
		$req->execute();
	}

	public function GetBOS($num)
	{   //Il s'agit de O(n3) car on réalise deux jointures donc deux boucles imbriquées et 
		//un SELECT qui est une boucle

		$req = $this->bd->prepare("SELECT  a.Student_ID,a.Nom, a.Prenom,c.Document_ID,b.BOS_ID, b.Status, c.Date_heure, b.BOS_FLAG  from 
		etudiant AS a INNER JOIN document AS c on a.Student_ID=c.Student_ID join bos AS b on c.Document_ID=b.Document_ID;");
		
		if (preg_match("/^[0-9]+$/",$num))
		{
			$req = $this->bd->prepare("SELECT  a.Student_ID,a.Nom, a.Prenom,c.Document_ID,b.BOS_ID, b.Status, c.Date_heure, b.BOS_FLAG   from 
			etudiant AS a INNER JOIN document AS c on a.Student_ID=c.Student_ID join bos AS b on c.Document_ID=b.Document_ID LIMIT ".$num.";");
		}

		$req->execute();
		$res=$req->get_result();

		$op=[];
		for ($i=0; $i < $num; $i++) 
		{ 
			$op[]=$res->fetch_assoc();
		}

		return $op;
	}

	public function GetCount($op)
	{ 	
		// Complexité algorithmique : O(n), car un SELECT est en réalité une boucle	

		if ($op =="bos") 
		{
			$req = $this->bd->prepare("SELECT  COUNT(*) FROM bos;");
		}

		elseif ($op =="bos validé")
		{
			$req = $this->bd->prepare("SELECT  COUNT(*) FROM bos WHERE Status =	'Validé';");
		}

		else
		{
			$req = $this->bd->prepare("SELECT  COUNT(*) FROM bos WHERE Status =	'Refusé';");
		}

		$req->execute();
		$res=$req->get_result();

		return $res->fetch_assoc()["COUNT(*)"];
	}

	public function GetBOS_info($id)
	{	// Compexité algorithmique : O(n3) car on réalise deux jointures donc deux boucles imbriquées 
		//ainsi qu'un SELECT qui en réalité une boucle//
		$req=$this->bd->prepare("SELECT  a.Student_ID,a.Nom, a.Prenom,c.Document_ID,b.BOS_ID, b.Status, c.Date_heure, c.URL  
		FROM etudiant AS a INNER JOIN document AS c USING(Student_ID) JOIN bos AS b USING(Document_ID) WHERE b.BOS_ID=? ;");
		$req->bind_param("i",$id);
		$req->execute();
		$res=$req->get_result();
		return $res->fetch_assoc();

	}


	public function change_status($id,$status)
	{
		// Complexité algorithmique : O(1) car elle realise un update dans la BDD
		$req=$this->bd->prepare("UPDATE `bos` SET `Status`=? WHERE `BOS_ID`=?");
		if(!$req){var_dump($this->bd->error);}
		$req->bind_param("si",$status,$id);
		$req->execute();
	}

	public function isindbbos($id)
	{	
		//Complexité algorithmique : O(n), car il s'agit d'une boucle 
		//qui vérifie si le résultat envoyé est différent de false
		return $this->GetBOS_info($id) !== false;
	}

	public function add_comment($comment,$doc_id,$perso_id,$visibility)
	{
		//Complexité algorithmique : O(1), car il effectue une seule opération d'insertion de données
		$req=$this->bd->prepare("INSERT INTO `commentaire`(`Visibility_Flag`, `Document_ID`, `Personnel_ID`, `commentaire`) VALUES (?,?,?,?)");
		$req->bind_param("iiis",$visibility,$doc_id,$perso_id,$comment);
		$req->execute();
	}

	public function get_comment($doc_id)
	{
		//Compléxité algorithmique: O(n), car il effectue une seule requête à la base de données 
		//pour récupérer tous les commentaires associés à un document donné, où n  est le nombre de commentaires 
		//associés à ce document. 
		if ($this->role == 0)
			{
				
				$req=$this->bd->prepare("SELECT `commentaire`,Nom,Prenom FROM `commentaire` JOIN personnel USING(Personnel_ID) WHERE Document_ID=?");
				$req->bind_param("i",$doc_id);
				$req->execute();
				$res=$req->get_result();
				return $res->fetch_all(MYSQLI_ASSOC);
			}
	}


	public function change_mail($id,$mail)
	{
		//Compexité algorithmique : O(n) ou "n" depend du nombre de ligne de la table personnel ou etudiant
		if($this->getRole()==0)
		{
			$req=$this->bd->prepare("UPDATE `personnel` SET `Mail`=? WHERE Personnel_ID=?");
		}
		else
		{
			$req=$this->bd->prepare("UPDATE `etudiant` SET `Mail`=? WHERE Personnel_ID=?");
		}
		$req->bind_param("si",$mail,$id);
		$req->execute();
	}

	public function change_mdp($id,$mdp)
	{	//Complexité algorithmique : O(n) car il effectue une opération de mise à jour de données 
		//sur une ligne spécifique en utilisant une jointure donc une boucle 
		if ($this->getRole()==0)
		{
			$req=$this->bd->prepare("UPDATE `login` INNER JOIN personnel on User_ID = ? AND User_ID = Personnel_ID SET `Password`=? ");
		}
		else
		{
			$req=$this->bd->prepare("UPDATE `login` INNER JOIN etudiant on User_ID = ? AND User_ID = Student_ID SET `Password`=? ");
		}
		$req->bind_param("is",$id,$mdp);
		$req->execute();
		if(!$req){
			var_dump($this->bd->error);
		}
	}

	public function research_student($tab)
	{
		//$tab=["name"=>"boudarga","formation"=>"BUT info","Stage"=>0,"group_name"=>"Athos","niveau"=>2];
		// critéres Nom de famille, Formation, Stage ou pas , Nom de groupe, niveau
		// Pensez à faire que la recherche porte uniquement sur l'année en cours
		//Complexité algorithmique : O(n2) car on réalise un SELECT qui est une boucle 
		//et une jointure qui est une boucle imbriquée
		$sql = 'SELECT e.Student_ID,e.Nom,e.Prenom,Groupe_ID,Stage_detention, g.Nom as group_name, g.Niveau FROM `etudiant` as e JOIN groupe as g USING(Groupe_ID) WHERE 1=1';
		$bv=[];
		if (isset($tab["name"]))
		{
			$c=$tab["name"];
			$sql .= " AND e.Nom LIKE ?";
			$bv[]=[
				"marqueur" => "s",
				"valeur" =>"%$c%"
			];
		}

		if (isset($tab["formation"]))
		{
			$sql .= " AND g.Formation_ID= ?";
			$bv[]=[
				"marqueur" => "i",
				"valeur" =>$tab["formation"]
			];
		}
		if (isset($tab["Stage"]))
		{
			$sql .= " AND e.Stage_detention= ?";
			$bv[]=[
				"marqueur" => "i",
				"valeur" =>$tab["Stage"]
			];

			
		}
		if (isset($tab["group"]))
		{
			$sql .= " AND g.Nom = ?";
			$bv[]=[
				"marqueur" => "s",
				"valeur" =>$tab["group"]
			];
		}

		if (isset($tab["Niveau"]))
		{
			$sql .= " AND g.Niveau= ?";
			$bv[]=[
				"marqueur" => "i",
				"valeur" =>$tab["Niveau"]
			];
		}
		$sql .=" ;";
		$req=$this->bd->prepare($sql);
		$filler="";
		$param=[];
		foreach($bv as $v)
		{
			$filler .= $v["marqueur"];
			$param[] = $v["valeur"];
		}
		if(!$req){
			var_dump($this->bd->error,$sql,$param);
		}
		if(!empty($bv)){$req->bind_param($filler, ...$param);}
		$req->execute();
		$res=$req->get_result();
		return $res->fetch_all(MYSQLI_ASSOC);
	}

	function getStudentinfo($id){

		//Compléxité algorithmique: O(n2), car il s'agit d'un SELECT qui est une boucle ainsi que d'une jointure qui est une boucle imbriquée 
		$req = $this->bd->prepare("SELECT e.Nom, e.Prenom,e.Student_ID,e.Stage_detention,g.Nom as groupe_name FROM etudiant as e JOIN groupe as g USING(Groupe_ID) WHERE Student_ID=?");
		$req->bind_param("i",$id);
		$req->execute();
		$res=$req->get_result();
		return $res->fetch_all(MYSQLI_ASSOC);
	}
	function getStudentdoc($id)
	{	//Complexité algorithmique : O(n) car il s'agit d'un SELECT avec une clause de condition donc une boucle
		$req = $this->bd->prepare("SELECT Type,Date_heure FROM document WHERE Student_ID=?");
		$req->bind_param("i",$id);
		$req->execute();
		$res=$req->get_result();
		return $res->fetch_all(MYSQLI_ASSOC);
	}
	function isexist($mail)
	{
		//complexite algorithmique : O(n) car elle effectue deux requêtes SQL qui chacune a une complexité
		// O(n) où n est le nombre de lignes retournées par la requête SQL.
		$req = $this->bd->prepare("SELECT l.Username from login as l join personnel as p where p.Mail = ? and p.Personnel_ID=l.User_ID;");
		$req->bind_param("s",$mail);
		$req->execute();
		$res=$req->get_result();
		$res=$res->fetch_all(MYSQLI_ASSOC);
		if (!empty($res)){return $res;}
		$req = $this->bd->prepare("SELECT l.Username from login as l join etudiant as p where p.Mail = ? and p.Student_ID=l.User_ID;");
		$req->bind_param("s",$mail);
		$req->execute();
		$res=$req->get_result();
		$res=$res->fetch_all(MYSQLI_ASSOC);
		if (!empty($res))
		{return $res;}
		return null;
		
	
	}
	function mdpforgot($res,$mdp)
	{	//Complexité algorithmique : O(1) car il réalise une mise à jour de la table Login dans la base de données
		$req=$this->bd->prepare("UPDATE `login` SET `Password`=? WHERE Username=?");
		$has = password_hash($mdp,PASSWORD_DEFAULT);
		$req->bind_param("ss",$has,$res);
		$req->execute();
	}
}

?>