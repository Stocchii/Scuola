public class Pizza {
    public String nome;
    public String ingredienti;
    public double prezzo;
    @Override
    public String toString(){
        return "\nNome\t\t" + nome + "\nIngredienti:\t\t" + ingredienti + "\nPrezzo\t\t" + prezzo;
    }
}
