package com.example.sitampol;

import android.content.Context;
import android.content.SharedPreferences;

import java.util.Date;

public class SessionHandler {
    private static final String user_nya = "UserSession";
    private static final String nama_nya = "nama_pelanggan";
    private static final String desa_nya = "desa";
    private static final String kecamatan_nya = "kecamatan";
    private static final String kota_nya = "kota";
    private static final String rt_nya = "rt";
    private static final String rw_nya = "rw";
    private static final String expires_nya = "expires";
    private Context mContext;
    private SharedPreferences.Editor mEditor;
    private SharedPreferences mPreferences;

    public SessionHandler(Context mContext)
    {
        this.mContext = mContext;
        mPreferences = mContext.getSharedPreferences(user_nya,Context.MODE_PRIVATE);
        this.mEditor = mPreferences.edit();
    }
    public void LoginUser (String nama_pelanggan,String desa,String kecamatan,String kota,String rt,String rw) {
        mEditor.putString(nama_nya,nama_pelanggan);
        mEditor.putString(desa_nya,desa);
        mEditor.putString(kecamatan_nya,kecamatan);
        mEditor.putString(kota_nya,kota);
        mEditor.putString(rt_nya,rt);
        mEditor.putString(rw_nya,rw);
        Date date = new Date();

        long mills = date.getTime() + (7 * 24 * 60 * 60 * 1000);
        mEditor.putLong(expires_nya,mills);
        mEditor.commit();
    }


    public boolean isLoggedIn() {
        Date currentDate = new Date();
        long millis = mPreferences.getLong(expires_nya,0);
        if (millis == 0 ){
            return false;
        }
        Date expiryDate = new Date(millis);
        return currentDate.before(expiryDate);
    }
    public User getUserDetails() {
        if (!isLoggedIn()){
            return null;
        }
        User user = new User();

        return user;
    }
    public void logoutUser(){
        mEditor.clear();
        mEditor.commit();
    }
}
