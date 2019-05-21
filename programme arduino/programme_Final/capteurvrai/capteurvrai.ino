
#define         READ_SAMPLE_TIMES            (10)     
//define how many samples you are going to take in normal operation

#define         READ_SAMPLE_INTERVAL         (50)    

//These values differ from sensor to sensor. User should derermine this value.


//define the  voltage drop   of the sensor when move the sensor from air into 1000ppm CO2



float
CO2Curve[3]  =  {ZERO_POINT_X, ZERO_POINT_VOLTAGE, (REACTION_VOLTGAE / (2.602 - 4))};

#define         DC_GAIN                      (8.5)  // definir l'amplificater du capteur

#define         MG_PIN                      (A5)     // definir la broche où le capteur est branché  

#define         ZERO_POINT_X                 (2.602) // definir la valeurs minimum en volt qui est capter par le capteur

#define         ZERO_POINT_VOLTAGE           (0.324) // definir la valeur en volt quand la concentration est à 400 ppm

#define         MAX_POINT_VOLTAGE            (0.265) // definir la valeur en volt quand la concentration est à 10000 ppm

#define         REACTION_VOLTGAE             (0.059) // definir la valeur en volt de changement de la valeur affiché
void setup() {
Serial.begin(9600);                                   // definir la vitesse de liaison
}
void loop() {
  
int percentage;                                       // declarer la variable dans lequelle on mettra la valeur en ppm
float volts;                                          // declarer la variable dans lequelle on mettra la valeur en volt
volts = MGRead(MG_PIN);                               // la variable "volt" prend la valeur lue sur la broche MG_PIN

Serial.print(volts);                                  // ecrire sur la liaison série la valeur de sortie de capteur en volt
Serial.print( "V           " );
percentage = MGGetPercentage(volts, CO2Curve);        // la variable prend la valeur réel en ppm calculer
Serial.print("CO2:");
if
(percentage == -1) {                                  // si cette valeur est inférieur à zero
Serial.println("moins de 400 ppm");                   // ecrire "moins de 400 ppm"
}
else                                                  // sinon
{
Serial.println(percentage);                           // ecrire la valeur de la variable percentage

}
Serial.println("ppm");
}


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
