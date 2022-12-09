public class Addition extends Operation {
	
private Nombre n1;
private Nombre n2;

public Addition () {
	super();
}

public Addition(Nombre n1, Nombre n2){
	super(n1,n2);
	}
	

public int Valeur (){
	int a = super.getOPerande1();
	int b =super.getOPerande2();
	int c = a + b;
	return c;
}

public String toString(){

	String s = "La Somme de " + super.getOPerande1() +  " et de " + super.getOPerande2() + " est égale à ";
	return s;
	}	
	
	
	
}
