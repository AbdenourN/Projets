public class Division extends Operation {
	
private Nombre n1;
private Nombre n2;

public Division () {
	super();
}

public Division(Nombre n1, Nombre n2){
	super(n1,n2);
}
	

public int Valeur (){
	int a = super.getOPerande1();
	int b = super.getOPerande2();
	
	if (b==0){
	throw new ArithmeticException("On ne peut pas diviser par 0. 1");
					 }
	int c = a / b;
	return c;
}

public String toString(){

	String s = "La Division de " + super.getOPerande1() +  " et de " + super.getOPerande2() + " est égale à : ";
	return s;
	}	
	
	
	
}
