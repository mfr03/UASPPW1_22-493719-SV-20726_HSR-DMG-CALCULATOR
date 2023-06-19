
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

![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/49e18851-20cd-4224-a9ef-1b17ada2b64a)
![image](https://github.com/mfr03/ProyekWeb1/assets/108723167/7951f8eb-9cff-47e7-abde-74cc81d02487)
