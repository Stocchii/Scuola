import com.google.gson.Gson;
import okhttp3.Headers;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

import java.io.IOException;

public class App {

    public OkHttpClient client;

    public App(){
        client = new OkHttpClient();
    }


    public void getAllPizze() throws IOException{
        Request request = new Request.Builder()
                .url("https://crudcrud.com/api/9facf74ec16944dd97464a776af08f91/pizzas")
                .build();

        try (Response response = client.newCall(request).execute()) {
            if (!response.isSuccessful()) throw new IOException("Unexpected code " + response);

            // STAMPA L'HEADER
            Headers responseHeaders = response.headers();
            for (int i = 0; i < responseHeaders.size(); i++) {
                System.out.println(responseHeaders.name(i) + ": " + responseHeaders.value(i));
            }

            // DESERIALIZZA IL JSON DEL BODY
            Gson gson = new Gson();
            Pizza[] pizze = gson.fromJson(response.body().string(), Pizza[].class);
            for (Pizza pizza : pizze) {
                System.out.println(pizza);
            }
        }

    }


    public void run(){
        try {
            getAllPizze();

        } catch (IOException e) {
            throw new RuntimeException(e);
        }


    }
}
