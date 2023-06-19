
### Nama Mahasiswa

Maulana Fikrie Rizaldi
22/493719/SV/20726

# HSR Damage Calculator

HSR Calculator merupakan proyek website untuk mengfasilitasi pemain-pemain game Honkai: Star Rail dengan suatu alat, yaitu Damage Calculator yang bertujuan untuk 
mempermudah pemain untuk mengukur kemampuan teoritis dan sinergi suatu karakter dengan kombinasi light cone, relics, dan berbagai macam buff terhadap suatu musuh.

# Kriteria Penilaian
![screencapture-localhost-hsr-calc-prj-2023-06-19-21_23_48](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/176483b4-b2ac-41ed-83fb-dd292d39135b)



## Desain

Webpage ini didesain dengan 3 kolom dasar, yang dimana setiap kolom berisi banyak cara untuk pengguna mengisi atau mengganti parameter-parameter 
yang mempengaruhi kalkukasi damage.

### Characters & Light Cone

![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/2e28a30e-0c13-432b-b2e2-2a8b14777a89)
![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/121e0ecb-8c94-48f9-9c8f-808b9dd1a34b)


Dalam kolom pertama terdapat menu karakter dan light cone, yang berisi informasi-informasi relevan terhadap karakter dan light cone yang user dapat 
isi atau ubah, seperti level kemampuan-kemampuan karakter dalam bentuk input. 
Untuk mengubah dari menu karakter menuju light cone, atau sebaliknya, dapat dilakukan dengan mengklik anchor element sesuai tujuan.

Dalam mengubah karakter maupun light cone, dapat mengklik gambarnya untuk membuka menu (modal bootstrap) yang berisi seleksi-seleksi yang ada. Dengan mengklik salah satu dari
seleksi, akan menggubah informasi-informasi relevan terhadap pilihan tersebut.

![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/d7d7fbd8-516b-4eed-a6bd-81c06b34d27c)
![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/975338ca-aee0-479f-af2c-8f284c87786e)



### Equipment & Enemy

![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/bd9c0911-8eaf-4bf6-9791-f2aa6166b471)
![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/b6880519-c3a9-4343-ad6c-90a540f5dd10)


Dalam kolom kedua, adalah menu equipment dan enemy. Menu equipment hampir mirip seperti menu karakter dan light cone dimana jika mengklik akan muncul menu beriisi seleksi-seleksi yang ada, dengan perbedaan jika memilih untuk mengambil satu set, maka akan merubah pilihan menjadi satu set baru. Sedangkan menu enemies adalah kumpulan-kumpulan debuff atau affliction yang musuh alami.

![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/cbfa1f5e-513d-4434-8552-001c96e24ebb)
![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/e29b8d89-08bc-482c-b2f8-9fae5dac66b8)


### Calculated Result
![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/6bb67bfb-f9f6-4238-b620-71f1e86469f7)


Merupakan kolom ketiga dan terakhir yang berisi kumpulan input yang user isi, yang digunakan untuk menghitung damage berdasarkan formula yang tersedia di [SRL](https://srl.keqingmains.com/combat-mechanics/damage/damage-formula).
Input yang user dapat isi adalah input yang tidak dalam bentuk *disabled*. Input-input yang dalam bentuk *disabled* dihitung otomatis berdasarkan formula yang digunakan.


## Responsive
Web ini responsive, dengan semakin pendek lebar layar maka kolom akan tersusun atas-kebawah, sedang dimana laptop tersusun kiri-kanan.
Dalam singkatnya, berikutlah kode yang bertugas untuk membuat halaman responsive.
```html
<div class="container mt-5">
    <div class="row">
        <div id="form-wrapper-selection-1" class="container col-sm-12 col-md-8 col-lg-7 col-xl-3 order-sm-1 order-2 mb-sm-4 mb-4"></div>
        <div id="form-wrapper-selection-2" class="container col-sm-12 col-md-8 col-lg-7 col-xl-3 order-sm-1 order-2 mb-sm-4 mb-4 "></div>
        <div id="form-wrapper-input-output" class="container col-sm-12 col-md-8 col-lg-7 col-xl-5 row-cols-1 order-sm-2 order-3 mb-sm-4 mb-4 rounded-3"></div>
    </div>
</div>
```
### Desktop / Laptop (width 1920px)
![screencapture-localhost-hsr-calc-prj-2023-06-19-21_23_48](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/176483b4-b2ac-41ed-83fb-dd292d39135b)
### Tablet (width 768px)
![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/46a796b6-4a80-4b47-b878-6ba57a6bc3d0)
### Mobile-Iphone SE (width 375px)
![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/345db833-ac84-4b09-ad0d-5e3291bedb0e)


## Direct Feedback
Pengguna mendapatkan feedback dalam bentuk perubahan angka damage ataupun base stats dengan mengubah parameter yang tersedia (input fields/modal). Berikut ini contoh salah satu alur kerja callStack yang memberi feedback kepada user.

```html
<input id="chara-level" type="text" class="form-control form-select-sm" value="80" onchange="callStack()">
```
merupakan salah satu parameter yang bertanggung jawab atas level karakter. Dalam perubahan nilai karakter tersebut, maka akan memamggil function javascript callStack().
```javascript
function callStack()
{   
    setBaseStats();
    changeConeDesc(document.getElementById("cone-name").innerText);
    changeCharaTalentDesc(document.getElementById("chara-name").innerText + document.getElementById("talent-level").value.toString());
    changeCharaTraces(document.getElementById("chara-name").innerText);
    checkSetBonus();
    mainFormula('Ultimate'); 
    mainFormula('BasicATK'); 
    mainFormula('Skill')
}
```
Karena yang diubah adalah level, function yang akan saya jelaskan lebih detail adalah setBaseStats() dan mainFormula(). setBaseStats merupakan salah satu function yang ada di calculateBaseStats.js yang digunakan untuk menghitung base stats (barisan input *disabled* sebelah flat stats di kolom tiga).
```javascript
function setBaseStats()
{
    var arr = baseStatsAll();
    document.getElementById("base-attack").value = Math.round(arr[0][0]) + Math.round(arr[1][0]);
    document.getElementById("base-defense").value = Math.round(arr[0][1]) + Math.round(arr[1][1]);
    document.getElementById("base-crit-rate").value = 5;
    document.getElementById("base-crit-dmg").value = 50;
    document.getElementById("base-break-effect").value = 0;
    document.getElementById("base-elemental-boost").value = 0;
    document.getElementById("base-elemental-pen").value = 0;
}
function baseStatsAll()
{   
    var level = document.getElementById("chara-level").value;
    var name = document.getElementById("chara-name").innerText;
    
    if(name == "March 7th")
    {
        name = "Mar7th";
    }

    baseStatsChara = getBaseStatsCharacter(level, name);
    var coneLevel = document.getElementById("cone-level").value;
    var coneName = document.getElementById("cone-name").innerText;
    baseStatsCone = getBaseStatsCone(coneLevel, coneName);
    return [baseStatsChara, baseStatsCone]
}
```
setBaseStats() akan memanggil baseStatsAll() dan berdasarkan hasil tersebut akan menentukan nilai elemen-elemen html base stats. baseStatsAll() akan memanggil function getBaseStatsCharacter, yang dimana function itu adalah
```javascript
function getBaseStatsCharacter(characterLevel, characterName)
{
  /*
    rest of the codes are omitted to make presentation shorter
  */
    $.ajax
    ({
        type:'POST',
        url:'pureHopelessPain/getBaseChara.php',
        async:false,
        data:
        {
            level: characterLevel,
            name: characterName,
        },
        dataType:'json',
        success:function(base)
        {   
            var atkStats = parseFloat(base.base_atk) + (parseFloat(base.add_atk) * (ogLevel - 1 ));
            var defStats = parseFloat(base.base_def) + (parseFloat(base.add_def) * (ogLevel - 1));
            returnv = [atkStats, defStats]
        }
    });
    return returnv;
}
```
merupakan kode AJAX yang memanggil kode php getBaseChara dengan memberikan kedua data yaitu $level dan $name. 
```php
<?php
    session_start();
    include 'connect.php';
    $res = mysqli_fetch_assoc(mysqli_query($_SESSION['mysqli'], "SELECT * FROM character_base_stats_n_level WHERE character_stats_n_level_id = " . "'" . $_POST["name"] .     $_POST["level"] ."';" ));
    echo json_encode(array(
        "base_atk" => $res['base_stats_atk'],
        "base_def" => $res['base_stats_def'],
        "add_atk" => $res['atk_add_per_level'],
        "add_def" => $res['def_add_per_level']
    ));
?>
```
getBaseChara memulai kodenya dengan session_start() untuk mengakses variabel session, yaitu mysqli, merupakan koneksi mysql yang dibuat dalam file connection.php. setelah itu menginclude connect.php, untuk membuka koneksi mysql lalu menjalankan kueri berdasarkan data yang dikirim getBaseStatsCharacter() dalam bentuk $_POST[]. Hasil kueri itu akan dikembalikan kepada getBaseCharacter() dalam bentuk JSON.
```php
<?php
    session_start();
    $servername = "p:localhost";
    $username = "root";
    $password = "";
    $database = "hsr_calc_prj";

    $_SESSION['mysqli'] = new mysqli($servername, $username, $password, $database);


    if(!$_SESSION['mysqli'])
    {
        die("connection failed : ".mysqli_connect_error());
    }
?>
```
```php
<?php
    $_SESSION['mysqli'] -> connect("p:localhost", "root", "", "hsr_calc_prj");
?>
```
Setelah setBaseStats() selanjutnya adalah function mainFormula()
```javascript
function mainFormula(skillType)
{   
    var outgoingDamage = baseDamage(skillType) * damageMultiplier() * defenseMultiplier() * resMultiplier() * dmgTakenMultiplier() *  universalDamageReduction();
    var nonCrit = document.getElementById(skillType + "-res");
    var crit = document.getElementById(skillType + "-res-crit");
    nonCrit.value = Math.round(outgoingDamage);
    var critdmg = parseInt(document.getElementById("base-crit-dmg").value) + parseInt(document.getElementById("flat-crit-dmg").value);
    crit.value = Math.round(outgoingDamage * (1 + (critdmg)/100))
}
```
yang merupakan representasi dari formula [SRL](https://srl.keqingmains.com/combat-mechanics/damage/damage-formula). Nilai yang telah dihitung akan ditampilkan dalam element html kolom ketiga, yang merupakan hasil dari direct feedback perubahan level karakter oleh pengguna.

## Konten dinamis
Jika pengguna mengganti seleksi karakter, light cone, ataupun mengganti relic set maka deskripsi yang keluar akan berbeda.

![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/0983bad6-1833-4789-8f8a-b7fdb71dac55)
![image](https://github.com/mfr03/UASPPW1_22-493719-SV-20726_HSR-DMG-CALCULATOR/assets/108723167/605a52e8-7413-4cec-98d8-8246b10f065d)


Prosesnya hampir mirip seperti yang ada di bagian direct feedback, hanya saja menggunakan file php getCharaTalentDesc, getConeDesc, getRelicDesc pada masing-masing konten yang akan diambil dari database. Berikut salah satu file phpnya.
```php
<?php
    session_start();
    include 'connect.php';
    $res = mysqli_fetch_assoc(mysqli_query($_SESSION['mysqli'], "SELECT * FROM character_talent WHERE character_talent_id = " . "'" . $_POST["name"] ."';" ));
    
    echo $res['talent_desc'];
?>
```
