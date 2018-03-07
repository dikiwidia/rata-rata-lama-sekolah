# rata-rata-lama-sekolah

[![Join the chat at https://gitter.im/rata-rata-lama-sekolah/Lobby](https://badges.gitter.im/rata-rata-lama-sekolah/Lobby.svg)](https://gitter.im/rata-rata-lama-sekolah/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/rata-rata-lama-sekolah/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rata-rata-lama-sekolah/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/rata-rata-lama-sekolah/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rata-rata-lama-sekolah/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/rata-rata-lama-sekolah/v/stable)](https://packagist.org/packages/bantenprov/rata-rata-lama-sekolah)
[![Total Downloads](https://poser.pugx.org/bantenprov/rata-rata-lama-sekolah/downloads)](https://packagist.org/packages/bantenprov/rata-rata-lama-sekolah)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/rata-rata-lama-sekolah/v/unstable)](https://packagist.org/packages/bantenprov/rata-rata-lama-sekolah)
[![License](https://poser.pugx.org/bantenprov/rata-rata-lama-sekolah/license)](https://packagist.org/packages/bantenprov/rata-rata-lama-sekolah)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/rata-rata-lama-sekolah/d/monthly)](https://packagist.org/packages/bantenprov/rata-rata-lama-sekolah)
[![Daily Downloads](https://poser.pugx.org/bantenprov/rata-rata-lama-sekolah/d/daily)](https://packagist.org/packages/bantenprov/rata-rata-lama-sekolah)


Rata-rata Lama Sekolah (RLS) Menurut Kabupaten/Kota 
### install via composer

- Development snapshot
```bash
$ composer require bantenprov/rata-rata-lama-sekolah:dev-master
```
- Latest release:


## download via github

~~~bash
$ git clone https://github.com/bantenprov/rata-rata-lama-sekolah.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\RRLamaSekolah\RRLamaSekolahServiceProvider::class,

```

#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/rr-lama-sekolah',
    components: {
      main: resolve => require(['./components/views/bantenprov/rr-lama-sekolah/DashboardRRLamaSekolah.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Rata-Rata Lama Sekolah"
    }
  }
```
```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/rr-lama-sekolah',
      components: {
        main: resolve => require(['./components/bantenprov/rr-lama-sekolah/RRLamaSekolahAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Rata-Rata Lama Sekolah"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Rata-Rata Lama Sekolah',
          link: '/dashboard/rr-lama-sekolah',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
```
#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import RRLamaSekolah from './components/bantenprov/rr-lama-sekolah/RRLamaSekolah.chart.vue';
Vue.component('echarts-rr-lama-sekolah', RRLamaSekolah);

import RRLamaSekolahKota from './components/bantenprov/rr-lama-sekolah/RRLamaSekolahKota.chart.vue';
Vue.component('echarts-rr-lama-sekolah-kota', RRLamaSekolahKota);

import RRLamaSekolahTahun from './components/bantenprov/rr-lama-sekolah/RRLamaSekolahTahun.chart.vue';
Vue.component('echarts-rr-lama-sekolah-tahun', RRLamaSekolahTahun);

import RRLamaSekolahAdminShow from './components/bantenprov/rr-lama-sekolah/RRLamaSekolahAdmin.show.vue';
Vue.component('admin-view-rr-lama-sekolah-tahun', RRLamaSekolahAdminShow);

//== Echarts Harapan Lama sekolah

import RRLamaSekolahBar01 from './components/views/bantenprov/rr-lama-sekolah/RRLamaSekolahBar01.vue';
Vue.component('rr-lama-sekolah-bar-01', RRLamaSekolahBar01);

import RRLamaSekolahBar02 from './components/views/bantenprov/rr-lama-sekolah/RRLamaSekolahBar02.vue';
Vue.component('rr-lama-sekolah-bar-02', RRLamaSekolahBar02);

//== mini bar charts
import RRLamaSekolahBar03 from './components/views/bantenprov/rr-lama-sekolah/RRLamaSekolahBar03.vue';
Vue.component('rr-lama-sekolah-bar-03', RRLamaSekolahBar03);

import RRLamaSekolahPie01 from './components/views/bantenprov/rr-lama-sekolah/RRLamaSekolahPie01.vue';
Vue.component('rr-lama-sekolah-pie-01', RRLamaSekolahPie01);

import RRLamaSekolahPie02 from './components/views/bantenprov/rr-lama-sekolah/RRLamaSekolahPie02.vue';
Vue.component('rr-lama-sekolah-pie-02', RRLamaSekolahPie02);

//== mini pie charts
import RRLamaSekolahPie03 from './components/views/bantenprov/rr-lama-sekolah/RRLamaSekolahPie03.vue';
Vue.component('rr-lama-sekolah-pie-03', RRLamaSekolahPie03);
```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=rr-lama-sekolah-assets
$ php artisan vendor:publish --tag=rr-lama-sekolah-public
```
