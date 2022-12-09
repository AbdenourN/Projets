public abstract class Operation {
	
	private Nombre n1;
	private Nombre n2;

	public Operation () {
		
	}
	
	public Operation(Nombre n1, Nombre n2){
		this.n1=n1;
		this.n2=n2;
	}

	public abstract int Valeur();
	
	public int getOPerande1() {
	return this.n1.Valeur();
	}
	public int getOPerande2() {
	return this.n2.Valeur();
	}
	
}
	
	
	
	
	
	
	
	
	
	
	

