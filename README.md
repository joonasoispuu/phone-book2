### Autorid : Joonas Õpispuu, Kristjan Georg Kessel, Marcus Toman

Projekti esmaseks käivitamiseks peale repo kloonimist:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```


# Telefoniraamatu teenus (Kessel, Toman, Õispuu)
Mõte selles, et kasutaja saab teenuse abil salvestada kontakte ja nende seast otsida 
PROJEKT KOOSNEB KOLMEST ERALDISEISVAST ÜLESANDEST

## Ülesanne 1. XML
Luua XML fail vabalt valitud andmete edastamiseks, selle faili skeemifail ning XSL fail(id) erinevate transformatsioonide tarvis (soovitavalt vähemalt andmete HTML ja XML kujul kuvamiseks)
XML fail peab sisaldama id, nimi, perekonnanimi, telefon, e-post võib lisada oma omadus. 
XML-il peab olema 2 või 3 loogilist dimensiooni.
```
<dim1>
  <dim2>
    <dim3>
    </dim3>
  </dim2>
</dim1>
```
Kuvada andmed HTML tabelina kasutades XSLT ja PHP failis erinevad funktsioonid (näiteks, otsida kontaktandmed nimi järgi). 
Välja mõelda vähemalt 3 funktsiooni.
 
## Ülesanne 2. Veebiteenus ja klientrakendus.
Luua veebiteenus ja klientrakendus, mis võimaldaks pakkuda teenust, eristada kasutajaid
Loodav veebiteenus: 
```
•	tuleb luua kasutades ASP.NET MVC Web API tehnoloogiat.
•	andmebaasis peab olema vähemalt 3 tabelid.
•	peab võimaldama teenuse pakkumist
•	peab toetama mitme kasutaja võimalust (administraator, registreeritud kasutaja, anonüümne).
```
Luua telefoniraamatu teenus ja klientrakendus: 
```
•	kasutaja saab teenuses kontakte lisada ja kustutada
•	kasutaja saab kontaktide nime/telefoninumbri jne abil otsida
•	kasutajaid on võimalik lisada gruppidesse
•	kasutajal on võimalik lisada vajalike kontaktandmete liike
•	kasutajatel on võimalik jagada omavahel kontakte ja kontaktide gruppe
```

## Ülesanne 3. Projekti dokumentatsioon.
Kasutajalood (PivotalTrackeris vms. keskkonnas) koos vastuvõtu tingimustega.
Lähtekood versioonihalduses, tähenduslikud koodikinnitused ja seotud kasutajalugudega.
Projekti loomise etapid koos vastavate kirjelduste ja piltidega.
Kasutajajuhend iga rolli jaoks.
