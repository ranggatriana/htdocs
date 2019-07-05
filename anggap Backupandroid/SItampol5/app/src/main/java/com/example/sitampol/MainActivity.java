package com.example.sitampol;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Gravity;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;

import com.example.sitampol.Fragment.BeliFragment;
import com.example.sitampol.Fragment.HomeFragment;
import com.example.sitampol.Fragment.PesanFragment;
import com.example.sitampol.Fragment.ProfileFragment;
import com.example.sitampol.Tab.MyAdapter;
import com.example.sitampol.Tab.SlidingTabLayout;
import com.mikepenz.materialdrawer.Drawer;
import com.mikepenz.materialdrawer.accountswitcher.AccountHeader;
import com.mikepenz.materialdrawer.model.PrimaryDrawerItem;
import com.mikepenz.materialdrawer.model.ProfileDrawerItem;

public class MainActivity extends AppCompatActivity {
    private SlidingTabLayout mSlidingTabLayout;
    private ViewPager mViewPager;
    private Drawer.Result navigationDrawerLeft;
    private AccountHeader.Result headerNavigationLeft;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        mViewPager=(ViewPager)findViewById(R.id.vp_tabs);
        mViewPager.setAdapter(new MyAdapter(getSupportFragmentManager(),this));

        mSlidingTabLayout=(SlidingTabLayout)findViewById(R.id.stl_tabs);
        mSlidingTabLayout.setDistributeEvently(true);
        mSlidingTabLayout.setBackgroundColor(getResources().getColor(R.color.colorPrimary));
        mSlidingTabLayout.setSelectedIndicatorColors(getResources().getColor(R.color.colorAccent));
        mSlidingTabLayout.setCustomTabView(R.layout.tab_view,R.id.tv_tab);
        mSlidingTabLayout.setViewPager(mViewPager);

        //navigasi
        headerNavigationLeft = new AccountHeader()
                .withActivity(this)
                .withCompactStyle(false)
                .withSavedInstance(savedInstanceState)
                .withHeaderBackground(R.drawable.blk)
                .addProfiles(
                        new ProfileDrawerItem().withName("Kebutuhan Ayam").withIcon(getResources().getDrawable(R.drawable.usericon))
                )
                .build();
        navigationDrawerLeft = new Drawer()
                .withActivity(this)
                .withToolbar(toolbar)
                .withDisplayBelowToolbar(false)
                .withActionBarDrawerToggleAnimated(true)
                .withDrawerGravity(Gravity.LEFT)
                .withSavedInstance(savedInstanceState)
                .withAccountHeader(headerNavigationLeft)
                .withSelectedItem(0)
                .build();

            navigationDrawerLeft.addItem(new PrimaryDrawerItem().withName("Beranda").withIcon(getResources().getDrawable(R.drawable.ic_home_black_24dp)));

        }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch (item.getItemId()) {
            case R.id.nav_beranda:
                Intent Beranda = new Intent(MainActivity.this,HomeFragment.class);
                startActivity(Beranda);
                break;
            case R.id.nav_beli :
                Intent Beli = new Intent(MainActivity.this,BeliFragment.class);
                startActivity(Beli);
                break;
            case 3 :
                Intent Pesan = new Intent(MainActivity.this,PesanFragment.class);
                startActivity(Pesan);
                break;
            case 4 :
                Intent Profile = new Intent(MainActivity.this,ProfileFragment.class);
                startActivity(Profile);
                break;
            case 5 :
                SessionHandler session = new SessionHandler(this);
                User user = session.getUserDetails();
                session.logoutUser();
                Intent logout = new Intent(this,LoginActivity.class);
                startActivity(logout);
                finish();

        }
        // Handle action bar EndangeredItem clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
