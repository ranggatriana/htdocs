package com.example.sitampol.Fragment;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTabHost;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.sitampol.R;



public class HomeFragment extends Fragment {
    private FragmentTabHost mtabhost;
    public HomeFragment() {
    }
   @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_home, container, false);
        mtabhost = (FragmentTabHost)view.findViewById(android.R.id.tabhost);
        mtabhost.setup(getActivity(),getChildFragmentManager(),R.id.realtabcontent);
         mtabhost.addTab(mtabhost.newTabSpec("beli").setIndicator("Beli"), BeliFragment.class,null);
       mtabhost.addTab(mtabhost.newTabSpec("pesan").setIndicator("Pesan"), PesanFragment.class,null);
        return view;
    }

}
