public class Pizza {
    public String nome;
    public String ingredienti;
    public double prezzo;

    @Override
    public String toString(){

        return "\nNome:\t\t\t" +nome + "\nIngredienti:\t" + ingredienti + "\nPrezzo:\t\t\t" + prezzo+ "\n";
    }
}
