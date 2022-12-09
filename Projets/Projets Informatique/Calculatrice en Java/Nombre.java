public class Nombre {
	
public int valeurNombre;

	public Nombre() {
	}

	public Nombre (int valeurNombre) {
		this.valeurNombre=valeurNombre;

	}
	public int Valeur() {
		return this.valeurNombre;
	}
	
	public String toString(){
		String s = "La valeur du nombre est : " + this.Valeur();
		return s;
	}	
	
	
	
	
	
}
