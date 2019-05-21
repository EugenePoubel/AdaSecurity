/************************Déclaration des Librairies************************************/
#include <SPI.h>
#include <Ethernet.h>
#include <DHT.h>
/************************Déclaration de broches************************************/
#define MG_PIN                       (A5)  
#define DHTPIN 2
/************************Déclaration Relative au programme des capteurs ************************************/
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);
#define         READ_SAMPLE_TIMES            (10)
#define         READ_SAMPLE_INTERVAL         (50)       
#define         DC_GAIN                      (8.5)   // definir l'amplificater du capteur
#define         ZERO_POINT_X                 (2.602) // definir la valeurs minimum en volt qui est capter par le capteur
#define         ZERO_POINT_VOLTAGE           (0.324) // definir la valeur en volt quand la concentration est à 400 ppm
#define         MAX_POINT_VOLTAGE            (0.265) // definir la valeur en volt quand la concentration est à 10000 ppm
#define         REACTION_VOLTGAE             (0.059)  
float CO2Curve[3]  =  {ZERO_POINT_X, ZERO_POINT_VOLTAGE, (REACTION_VOLTGAE / (2.602 - 4))};
/************************Paramètre Réseau************************************/
byte mac[] = { 0x90, 0xA2, 0xDA, 0x0E, 0xA5, 0x7E };
IPAddress ip(192,168,0,143);
EthernetClient client;
char serveur[] = "adasecurity.fr";
/************************Variable Relative au programme réseau************************************/
char carlu = 0; // pour lire les caractères
long derniereRequete = 0; // moment de la dernière requête
const long updateInterval = 30000; // temps minimum entre deux requêtes
bool etaitConnecte = false; // mémorise l'état de la connexion entre deux tours de loop
char erreur = 0;
int t = 0;  
int h = 0;  
int c = -1;
String data;
/***********************************************************************************************/
void setup() {
  // On démarre la voie série pour déboguer
  Serial.begin(9600);
  dht.begin(); 
  erreur = Ethernet.begin(mac);
/************************attribution IP Automatique (DHCP)************************************/
  if (erreur == 0) {
    Serial.println("Parametrage avec ip fixe...");
    // si une erreur a eu lieu cela signifie que l'attribution DHCP
    // ne fonctionne pas. On initialise donc en forçant une IP
    Ethernet.begin(mac, ip);
  }
  Serial.println("Init...");
  // Donne une seconde au shield pour s'initialiser
  delay(1000);
  Serial.println("Pret !");
}
/***********************************************************************************************/
void loop()
{
int percentage;                                       // declarer la variable dans lequelle on mettra la valeur en ppm
float volts;                                          // declarer la variable dans lequelle on mettra la valeur en volt
volts = MGRead(MG_PIN);  
percentage = MGGetPercentage(volts, CO2Curve); 
/**********************Récupération des Valeurs des Capteurs**********************************/
h = (int) dht.readHumidity(); 
t = (int) dht.readTemperature();
c = percentage;
data = String("temp1=") + t + "&hum1=" + h + "&co21=" + c;
  // on lit les caractères s'il y en a de disponibles
  if(client.available()) {
    carlu = client.read();
    Serial.print(carlu);
  }

  // SI on était connecté au tour précédent
  // ET que maintenant on est plus connecté
  // ALORS on ferme la connexion
  if (etaitConnecte && !client.connected()) {
    Serial.println();
    Serial.println("Deconnexion !");
    // On ferme le client
    client.stop();
  }

  // Si on est déconnecté
  // et que cela fait plus de xx secondes qu'on a pas fait de requête
  if(!client.connected() && ((millis() - derniereRequete) > updateInterval)) {
    requete();
  }

  // enregistre l'état de la connexion (ouvert ou fermé)
  etaitConnecte = client.connected();
}
/**********************Envoie des Donnée au Site WEB**********************************/
void requete() {
  // On connecte notre Arduino sur "perdu.com" et le port 80 (defaut pour l'http)
  char erreur = client.connect(serveur, 80);

  if(erreur == 1) {
      // Pas d'erreur ? on continue !
      Serial.println("Connexion OK, envoi en cours...");
 Serial.print("Data:");
 Serial.println(data);
      // On construit l'en-tête de la requête
    client.println("POST /php/add.php HTTP/1.1"); 
    client.println("Host: adasecurity.fr"); // SERVER ADDRESS HERE TOO
    client.println("Content-Type: application/x-www-form-urlencoded; charset=utf-8"); 
    client.print("Content-Length: "); 
    client.println(data.length()); 
    client.println(); 
    client.print(data); 
     Serial.print("Envoi En Cours");

      // On enregistre le moment d'envoi de la dernière requête
      derniereRequete = millis();
  } else {
    // La connexion a échoué :(
    // On ferme notre client
    client.stop();
    // On avertit l'utilisateur
    Serial.println("Echec de la connexion");
    switch(erreur) {
      case(-1):
        Serial.println("Time out");
        break;
      case(-2):
        Serial.println("Serveur invalide");
        break;
      case(-3):
        Serial.println("Tronque");
        break;
      case(-4):
        Serial.println("Reponse invalide");
        break;
    }
  }
}
/**********************Lecture du Capteurs CO2**********************************/
float MGRead(int mg_pin) {
int i;
float v = 0;
for
(i=0;i<READ_SAMPLE_TIMES;i++){
v += analogRead(mg_pin);
delay(READ_SAMPLE_INTERVAL);
}
v=(v/READ_SAMPLE_TIMES)*5/1024;
return
v;
}
int  MGGetPercentage(float volts, float *pcurve) {
volts = volts / DC_GAIN;
if
(volts > ZERO_POINT_VOLTAGE || volts < MAX_POINT_VOLTAGE ) {
return
-1;
}
else
{
return
pow(10, (volts - pcurve[1]) / pcurve[2] + pcurve[0]);
volts = 0;
}
}
