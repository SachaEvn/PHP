# Exercice page 24:
Correction : 
Pays(codePays,nomP)
Athelete(aid,nomAth,prenomAth,dataNaissance,_codePays_)
Equipe(eqId,_codePays_)
Epreuve(epid,nomEp,categorie,dateDebut,dateFin,_sid_)
Sport(sid,nomSP)
## On crée une nouvelle classe :
//clefs primaires de (equipe+athlete) pour relier les deux
equipeAthlete(_eqId_,_aid_)
epreuveEquipe(_epid_,_eqid_,rangEq)
epreuveAthlete(_epid_,_aid_,rangAth)

Exercice page 50:
1) SELECT * FROM city
2) SELECT SurfaceArea,Population,Capital FROM country
3) SELECT DISTINCT * FROM countrylanguage ORDER BY Language
4) SELECT Population / SurfaceArea FROM country
5) SELECT SurfaceArea,Population,Capital FROM country WHERE Name = "Philipines"
6) SELECT Name FROM country WHERE (countryLanguage.CountryCode = CountryCode AND countryCode.Language = "Français")

6) SELECT Name FROM country INNER JOIN countryLanguage ON country.countryCode = countryLanguage.countryCode

7) SELECT Name FROM city WHERE Population > 5000000 ORDER BY Name DESC
8) SELECT Name FROM country WHERE Population < 1000000
9) SELECT Name FROM country WHERE ((Continent = North America OR Continent = South America) AND Population BETWEEN 1000000 AND 10000000)
10) SELECT Name FROM country INNER JOIN countryLanguage ON country.countryCode = countryLanguage.countryCode
11) SELECT Capital, Population FROM country WHERE Name = "Burkina Faso"
12) SELECT Name FROM country INNER JOIN city ON (country.Capital = city.Name AND city.Population < 10000)
13) 