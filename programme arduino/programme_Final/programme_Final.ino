// Ces deux bibliothèques sont indispensables pour le shield
#include <SPI.h>
#include <Ethernet.h>
#include <DHT.h>

// L'adresse MAC du shield
byte mac[] = { 0x90, 0xA2, 0xDA, 0x0E, 0xA5, 0x7E };
// L'adresse IP que prendra le shield
IPAddress ip(192,168,0,143);
// L'objet qui nous servira a la communication
EthernetClient client;
// Le serveur à interroger
char serveur[] = "adasecurity.fr";

// pour lire les caractères
char carlu = 0;
// moment de la dernière requête
long derniereRequete = 0;
// temps minimum entre deux requêtes
const long updateInterval = 30000;
// mémorise l'état de la connexion entre deux tours de loop
bool etaitConnecte = false;
//DHT22
int t = 0;  // TEMPERATURE VAR
int h = 0;  // HUMIDITY VAR
int c = -400;
#define DHTPIN 2 // SENSOR PIN
#define DHTTYPE DHT22 // SENSOR TYPE - THE ADAFRUIT LIBRARY OFFERS SUPPORT FOR MORE MODELS
DHT dht(DHTPIN, DHTTYPE);
String data;
void setup() {
  // On démarre la voie série pour déboguer
  Serial.begin(9600);
  dht.begin(); 

  char erreur = 0;
  // On démarre le shield Ethernet SANS adresse IP (donc donnée via DHCP)
  erreur = Ethernet.begin(mac);

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

void loop()
{
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

void requete() {
  // On connecte notre Arduino sur "perdu.com" et le port 80 (defaut pour l'http)
  char erreur = client.connect(serveur, 80);

  if(erreur == 1) {
      // Pas d'erreur ? on continue !
      Serial.println("Connexion OK, envoi en cours...");
    h = (int) dht.readHumidity();
    t = (int) dht.readTemperature();
 data = String("temp1=") + t + "&hum1=" + h + "&co21=" + -1;
 Serial.print("Data:");
 Serial.println(data);
      // On construit l'en-tête de la requête
    client.println("POST /add.php HTTP/1.1"); 
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
