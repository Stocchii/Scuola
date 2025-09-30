import com.google.gson.Gson;
import okhttp3.Headers;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

import java.io.IOException;

public class App {

    public OkHttpClient client;
    public App() {
        client = new OkHttpClient();
    }
    public void doGet(){
        Request  request = new Request.Builder()
                .url("https://crudcrud.com/api/2aa4e4ac184f4d7e8e4b60b94c341717/pizze/")
                .build();

        try (Response response = client.newCall(request).execute()) {
            if (!response.isSuccessful()) throw new IOException("Unexpected code " + response);

            Headers responseHeaders = response.headers();
            for (int i = 0; i < responseHeaders.size(); i++) {
                System.out.println(responseHeaders.name(i) + ": " + responseHeaders.value(i));
            }
            Gson gson = new Gson();
            Pizza[] pizze = gson.fromJson(response.body().toString(), Pizza[].class);
            for(Pizza pizza : pizze) {
                System.out.println(pizza.toString());
        }
        }
    }

    public void run(){
        doGet();

    }
}
