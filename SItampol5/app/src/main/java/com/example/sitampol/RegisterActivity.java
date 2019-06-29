package com.example.sitampol;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {
    private EditText username, password, nama_pelanggan, desa, kecamatan, kota, rt, rw;
    private Button btnRegister;

    String url_register = "http://192.168.43.240/sitampol/api/register";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        username = findViewById(R.id.editTextUserName);
        password = findViewById(R.id.editTextPassword);
        nama_pelanggan = findViewById(R.id.editTextNamaPelanggan);
        desa = findViewById(R.id.editTextDesa);
        kecamatan = findViewById(R.id.editTextKecamatan);
        kota = findViewById(R.id.editTextKota);
        rt = findViewById(R.id.editTextrt);
        rw = findViewById(R.id.editTextrw);
        btnRegister = findViewById(R.id.buttonRegister);
        btnRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                registerUser();

            }
        });
    }


    //membuat string request

    private void registerUser() {
        final String username_nya = username.getText().toString().trim();
        final String password_nya = password.getText().toString().trim();
        final String nama_nya = nama_pelanggan.getText().toString().trim();
        final String desa_nya = desa.getText().toString().trim();
        final String kecamatan_nya = kecamatan.getText().toString().trim();
        final String kota_nya = kota.getText().toString().trim();
        final String rt_nya = rt.getText().toString().trim();
        final String rw_nya = rw.getText().toString().trim();

        if (username_nya.isEmpty()) {
            nama_pelanggan.setError("Nama Pelanggan belum terisi");
        } else if (password_nya.isEmpty()) {
            username.setError("Username belum diisi!");
        } else if (desa_nya.isEmpty()) {
            desa.setError("Desa belum diisi!");
        } else if (kecamatan_nya.isEmpty()) {
            kecamatan.setError("Kecamatan belum diisi!");
        } else if (kota_nya.isEmpty()) {
            kota.setError("Kota belum diisi!");
        } else if (rt_nya.isEmpty()) {
            rt.setError("Rt belum diisi!");
        } else if (rw_nya.isEmpty()) {
            rw.setError("Rw belum diisi!");
        } else if (rt_nya.isEmpty()) {
            password.setError("Password belum diisi!");
        }else {

            StringRequest request = new StringRequest(Request.Method.POST, url_register,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            try {
                                Log.e("BebasSopan", response.toString());
                                JSONObject jsonObject = new JSONObject(response);
//                            System.out.println(jsonObject);
                                String response_login = jsonObject.getString("status");


                                if (response_login.equals("0")) {
                                    Toast.makeText(RegisterActivity.this, "username sudah pernah dipakai", Toast.LENGTH_SHORT).show();
                                }
                                if (response_login.equals("1")) {
                                    Toast.makeText(RegisterActivity.this, "registrasi gagal!", Toast.LENGTH_SHORT).show();
                                }
                                if (response_login.equals("2")) {
                                    Toast.makeText(RegisterActivity.this, "Registrasi berhasil", Toast.LENGTH_SHORT).show();
                                    Intent intent = new Intent(RegisterActivity.this, LoginActivity.class);
                                    startActivity(intent);
                                }


                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(RegisterActivity.this, "Register Error!" + error.toString(), Toast.LENGTH_SHORT).show();
                }
            }) {

                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put("nama", nama_nya);
                    params.put("username", username_nya);
                    params.put("desa", desa_nya);
                    params.put("kecamatan", kecamatan_nya);
                    params.put("kota", kota_nya);
                    params.put("rt", rt_nya);
                    params.put("rw", rw_nya);
                    params.put("password", password_nya);
                    return params;
                }
            };
            RequestQueue requestQueue = Volley.newRequestQueue(this);
            requestQueue.add(request);
        }
    }
}