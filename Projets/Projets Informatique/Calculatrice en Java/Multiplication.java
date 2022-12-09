public class Multiplication extends Operation {
	
private Nombre n1;
private Nombre n2;

public Multiplication () {
	super();
}

public Multiplication(Nombre n1, Nombre n2){
	super(n1,n2);
	}
	

public int Valeur (){
	int a = super.getOPerande1();
	int b =super.getOPerande2();
	int c = a * b;
	return c;
}

public String toString(){

	String s = "La Multiplication de " + super.getOPerande1() +  " avec " + super.getOPerande2() + " est égale à ";
	return s;
	}	
	
	
	
}