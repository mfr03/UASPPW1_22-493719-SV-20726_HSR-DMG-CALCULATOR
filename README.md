
### Nama Mahasiswa

Maulana Fikrie Rizaldi
22/493719/SV/20726

# HSR Damage Calculator

HSR Calculator merupakan proyek website untuk mengfasilitasi pemain-pemain game Honkai: Star Rail dengan suatu alat, yaitu Damage Calculator yang bertujuan untuk 
mempermudah pemain untuk mengukur kemampuan teoritis dan sinergi suatu karakter dengan kombinasi light cone, relics, dan berbagai macam buff terhadap suatu musuh.

# Kriteria Penilaian

![screencapture-localhost-hsr-calc-prj-2023-06-19-21_23_48](https://github.com/mfr03/ProyekWeb1/assets/108723167/e93f1043-d1d8-4d6e-ae78-ee48075098cc)

## Desain

Webpage ini didesain dengan 3 kolom dasar, yang dimana setiap kolom berisi banyak cara untuk pengguna mengisi atau mengganti parameter-parameter 
yang mempengaruhi kalkukasi damage.

### Characters & Light Cone

![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/f20b1822-db01-4031-b4f2-4bcc16369e43)
![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/7d1e6c54-c389-4475-82ef-f2839f607fad)


Dalam kolom pertama terdapat menu karakter dan light cone, yang berisi informasi-informasi relevan terhadap karakter dan light cone yang user dapat 
isi atau ubah, seperti level kemampuan-kemampuan karakter dalam bentuk input. 
Untuk mengubah dari menu karakter menuju light cone, atau sebaliknya, dapat dilakukan dengan mengklik anchor element sesuai tujuan.

Dalam mengubah karakter maupun light cone, dapat mengklik gambarnya untuk membuka menu (modal bootstrap) yang berisi seleksi-seleksi yang ada. Dengan mengklik salah satu dari
seleksi, akan menggubah informasi-informasi relevan terhadap pilihan tersebut.

![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/b79890c0-29bf-4af5-9632-11b182fa1e47)
![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/d09aed1b-bad6-4a93-aca0-f494e5352abc)

### Equipment & Enemy

![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/ef008b79-b358-431e-8b37-b5e631e2ba10)
![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/af50d393-1f82-4de4-a25b-cad2aa26388f)

Dalam kolom kedua, adalah menu equipment dan enemy. Menu equipment hampir mirip seperti menu karakter dan light cone dimana jika mengklik akan muncul menu beriisi seleksi-seleksi yang ada, dengan perbedaan jika memilih untuk mengambil satu set, maka akan merubah pilihan menjadi satu set baru. Sedangkan menu enemies adalah kumpulan-kumpulan debuff atau affliction yang musuh alami.

![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/5c9c7c99-0a72-48d5-8ef7-2c4fa931523a)
![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/760a452e-5959-4108-b45d-974c4fd25447)

### Calculated Result
![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/687afba7-8e94-4eea-92b8-7daef0dcb73f)

Merupakan kolom ketiga dan terakhir yang berisi kumpulan input yang user isi, yang digunakan untuk menghitung damage berdasarkan formula yang tersedia di [SRL](https://srl.keqingmains.com/combat-mechanics/damage/damage-formula).
Input yang user dapat isi adalah input yang tidak dalam bentuk *disabled*. Input-input yang dalam bentuk *disabled* dihitung otomatis berdasarkan formula yang digunakan.


## Responsive
Web ini responsive, dengan semakin pendek lebar layar maka kolom akan tersusun atas-kebawah, sedang dimana laptop tersusun kiri-kanan
### Desktop / Laptop (width 1920px)
![screencapture-localhost-hsr-calc-prj-2023-06-19-21_23_48](https://github.com/mfr03/ProyekWeb1/assets/108723167/e93f1043-d1d8-4d6e-ae78-ee48075098cc)
### Tablet (width 768px)
![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/50f02ed8-d0cf-4d71-b974-24026cdd8f8e)
### Mobile-Iphone SE (width 375px)
![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/ab00ebbf-4937-4973-b3f1-4345d1ebc462)

## Direct Feedback
