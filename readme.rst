###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/user_guide/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.




















list api


*******************
REGISTER POST
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Users/register
request :
{
	"username":"badrun",
	"password":"12346",
	"email":"badrun@gmail.com",
	"fullname":"Badrun Ahmad"
}

response: 

{
    "resultcode": "00",
    "status": "sukses",
    "pesan": "Register Berhasil"
}


*******************
LOGIN POST
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Users/login
request :
{
	"username":"indrarahdian",
	"password":"123456"
}

response: 

{
    "resultcode": "00",
    "status": "sukses",
    "pesan": "Login Berhasil",
    "data": [
        {
            "id": "2",
            "username": "indrarahdian",
            "password": "7c4a8d09ca3762af61e59520943dc26494f8941b",
            "email": "indra.rahdian@gmail.com",
            "fullname": "Indra Rahdian",
            "status": "1",
            "created_at": "2021-06-07 08:46:49",
            "updated_at": "2021-06-07 08:46:49"
        }
    ]
}


*******************
HOTEL LIST GET
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Hotel/hotellist
request :
NO REQUEST

response: 

{
    "resultcode": "00",
    "status": "sukses",
    "data": [
        {
            "id": "14",
            "nama_hotel": "Hotel C",
            "kota": "Bali",
            "icon_hotel": "https://jatrahotel.insoft-dev.com/assets/images/icon_hotel/60c31d1458635.jpg"
        },
        {
            "id": "15",
            "nama_hotel": "Hotel Buyung 2",
            "kota": "Pekanbaru",
            "icon_hotel": "https://jatrahotel.insoft-dev.com/assets/images/icon_hotel/60c31d0295e86.jpg"
        }
    ]
}


*******************
HOTEL SLIDER GET
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Hotel/hotelslider
request :

{
	"id_hotel" : 19
}

response: 

{
    "resultcode": "00",
    "status": "sukses",
    "data": [
        {
            "id": "8",
            "id_hotel": "19",
            "image_slider": "https://jatrahotel.insoft-dev.com/assets/images/hotel_slider/60c441ac4468f.jpg"
        },
        {
            "id": "9",
            "id_hotel": "19",
            "image_slider": "https://jatrahotel.insoft-dev.com/assets/images/hotel_slider/60c441b17fcf3.jpg"
        },
        {
            "id": "11",
            "id_hotel": "19",
            "image_slider": "https://jatrahotel.insoft-dev.com/assets/images/hotel_slider/60c4437863123.jpg"
        }
    ]
}


*******************
CITY LIST GET
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Hotel/citylist
request :
NO REQUEST

response: 

{
    "resultcode": "00",
    "status": "sukses",
    "data": [
        {
            "id": "6",
            "nama_kota": "Balikpapan",
            "icon_kota": "https://jatrahotel.insoft-dev.com/assets/images/icon_kota/60c3f7694fbc1.jpg"
        },
        {
            "id": "7",
            "nama_kota": "Pekanbaru",
            "icon_kota": "https://jatrahotel.insoft-dev.com/assets/images/icon_kota/60c3f684dbdab.jpg"
        },
        {
            "id": "8",
            "nama_kota": "Bali",
            "icon_kota": "https://jatrahotel.insoft-dev.com/assets/images/icon_kota/60c3f759403e5.jpg"
        }
    ]
}



*******************
FACILITIES LIST POST
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Facility/facilitylist
request :
{
	"id": "",
	"id_hotel" : "",
	"type": "1"
}

response: 

{
    "resultcode": "00",
    "status": "sukses",
    "data": [
        {
            "id_fasilitas": "1",
            "id_hotel": "20",
            "type": "1",
            "nama_fasilitas": "Superior Room",
            "subtitle": "38 Sqm I Cozy &amp; Modern Design | Double or Twin",
            "title": "<p><span style=\"color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 15px; letter-spacing: 0.2px;\">The luxury Business Suite of Grand Jatra Balikpapan is an exceptional type of luxury accommodation unique on the heart of the capital. It is situated in a privileged site and overlooks Balikpapan city view. High aesthetics , space, contemporary design, high quality materials together with automated facilities ensure an extraordinary stay.</span><br style=\"padding: 0px; margin: 0px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 15px; letter-spacing: 0.2px;\"><br style=\"padding: 0px; margin: 0px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 15px; letter-spacing: 0.2px;\"><br style=\"padding: 0px; margin: 0px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 15px; letter-spacing: 0.2px;\"><br style=\"padding: 0px; margin: 0px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 15px; letter-spacing: 0.2px;\"><br></p>",
            "deskripsi": "",
            "size": "25sqm",
            "pax": "2 Adult(S) 1 Children",
            "bedding_option": "1 Double Bed Or 2 Single Beds",
            "detail": "",
            "booking_price": "818000",
            "slider_image": [
                {
                    "id": "14",
                    "id_fasilitas": "1",
                    "id_hotel": "20",
                    "gambar": "https://jatrahotel.insoft-dev.com/assets/images/room_slider/60c6939cecb91.jpg"
                },
                {
                    "id": "15",
                    "id_fasilitas": "1",
                    "id_hotel": "20",
                    "gambar": "https://jatrahotel.insoft-dev.com/assets/images/room_slider/60c693ad6dfff.jpg"
                }
            ]
        }
       
    ]
}



*******************
PROMO LIST POST
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Promo/promolist
request :
{
	"id_hotel" : "16",
}

response: 

{
    "resultcode": "00",
    "status": "sukses",
    "data": [
        {
            "id": "1",
            "judul_promo": "Ice Skating Room Package",
            "deskripsi": "<p class=\"MsoNormal\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0.0001pt; margin-left: 0px; font-family: Roboto, sans-serif; font-size: 15px; color: rgb(51, 51, 51); line-height: 19px; letter-spacing: 0.2px;\"><span style=\"padding: 0px; margin: 0px; font-size: 15.3333px; color: rgb(204, 204, 204); line-height: 12px; letter-spacing: 0.3px;\">ICE SKATING PACKAGE</span></p><p class=\"MsoNormal\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0.0001pt; margin-left: 0px; font-family: Roboto, sans-serif; font-size: 15px; color: rgb(51, 51, 51); line-height: 19px; letter-spacing: 0.2px;\"><span style=\"padding: 0px; margin: 0px; font-size: 15.3333px; color: rgb(204, 204, 204); line-height: 12px; letter-spacing: 0.3px;\"><br style=\"padding: 0px; margin: 0px;\"></span></p><div style=\"padding: 0px; margin: 0px; font-family: Roboto, sans-serif; font-size: 15px; color: rgb(51, 51, 51); line-height: 20px; letter-spacing: 0.2px;\">Package include:<div style=\"padding: 0px; margin: 0px; line-height: 20px; letter-spacing: 0.2px;\"><ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style-position: inside;\"><li style=\"padding: 0px; margin: 0px; line-height: 20px; letter-spacing: 0.2px;\">Welcome drink upon arrival&nbsp;</li><li style=\"padding: 0px; margin: 0px; line-height: 20px; letter-spacing: 0.2px;\">Enjoy daily buffet breakfast at Bellagio Restaurant for two person</li><li style=\"padding: 0px; margin: 0px; line-height: 20px; letter-spacing: 0.2px;\">Complimentary 2 tickets Ice Skating at Pentacity Mall</li><li style=\"padding: 0px; margin: 0px; line-height: 20px; letter-spacing: 0.2px;\">Free entrance to swimming pool and fitness center</li><li style=\"padding: 0px; margin: 0px; line-height: 20px; letter-spacing: 0.2px;\">WiFi access for 24 hours at the room and&nbsp;public area facility</li></ul></div></div>",
            "status": "1",
            "expired_date": "2021-06-20",
            "created_at": "2021-06-17 07:46:44",
            "gambar_promo": "https://jatrahotel.insoft-dev.com/assets/images/promo/60ca9b74b2558.png"
        }
    ]
}


*******************
VOUCHER LIST POST
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Voucher/voucherlist
request :
{
    "id_voucher":"",
    "tipe_voucher":"",
    "id_hotel":"",
    "id_fasilitas":""
}

response:
{
    "resultcode": "00",
    "status": "sukses",
    "data": [
        {
            "id": "5",
            "nama_voucher": "Voucher Junior Suite",
            "type_voucher": "1",
            "id_hotel": "16",
            "id_fasilitas": "2",
            "expired_date": "2021-06-30",
            "voucher_value": "900000",
            "created_at": "2021-06-18 19:47:28",
            "status": "1",
            "deskripsi": "",
            "gambar_voucher": "https://jatrahotel.insoft-dev.com/assets/images/voucher/60cc95e03f492.png"
        },
        {
            "id": "6",
            "nama_voucher": "Voucher Spa",
            "type_voucher": "3",
            "id_hotel": "17",
            "id_fasilitas": "10",
            "expired_date": "2021-06-30",
            "voucher_value": "56000",
            "created_at": "2021-06-18 19:47:52",
            "status": "1",
            "deskripsi": "",
            "gambar_voucher": "https://jatrahotel.insoft-dev.com/assets/images/voucher/60cc95f8d8b4b.png"
        },
        {
            "id": "7",
            "nama_voucher": "Voucher Taxi Blast",
            "type_voucher": "5",
            "id_hotel": "18",
            "id_fasilitas": "13",
            "expired_date": "2021-06-30",
            "voucher_value": "54000",
            "created_at": "2021-06-18 19:49:43",
            "status": "1",
            "deskripsi": "",
            "gambar_voucher": "https://jatrahotel.insoft-dev.com/assets/images/voucher/60cc966785c75.png"
        },
        {
            "id": "8",
            "nama_voucher": "Voucher Room Suite",
            "type_voucher": "1",
            "id_hotel": "16",
            "id_fasilitas": "2",
            "expired_date": "2021-06-30",
            "voucher_value": "800000",
            "created_at": "2021-06-19 06:47:16",
            "status": "1",
            "deskripsi": "<p style=\"text-align: center; \"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><br></p>",
            "gambar_voucher": "https://jatrahotel.insoft-dev.com/assets/images/voucher/60cd2fc43b566.png"
        }
    ]
}


*******************
EDIT PROFIL POST
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Users/editprofil

REQUEST:
{
    
    "id_user" : 2
}


RESPONSE: 

{
    "resultcode": "00",
    "status": "sukses",
    "pesan": "edit profil sukses",
    "data": [
        {
            "id": "2",
            "username": "indrarahdian",
            "email": "indra.rahdian@gmail.com",
            "fullname": "Indra Rahdian",
            "no_telepon": "",
            "jenis_kelamin": "",
            "created_at": "2021-06-07 08:46:49",
            "updated_at": "2021-06-07 08:46:49",
            "status": "1",
            "balance": "0",
            "poin": "0",
            "gambar_profil": "https://jatrahotel.insoft-dev.com/assets/images/profil/"
        }
    ]
}


*******************
UPDATE PROFIL POST
*******************
https://jatrahotel.insoft-dev.com/index.php/api/Users/updateprofil

REQUEST:
{
    
    
    "id_user" : 2,
    "email": "keynez@mail.com",
    "fullname" :"keynez perdana",
    "no_telepon":"082165174877",
    "jenis_kelamin":"laki-laki",
    "tanggal_lahir":"2021-06-30",
    "gambar":"base64"

}


RESPONSE: 

{
    "resultcode": "00",
    "status": "sukses",
    "pesan": "update profil sukses"
}