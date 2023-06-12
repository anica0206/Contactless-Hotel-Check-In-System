import { ImageBackground, StyleSheet, Text, View, Image } from 'react-native';
import {Link} from "expo-router"


export default function HomeScreen() {
    const image = require('../src/components/home_bg.png') 

  return (
    <View style={styles.container}>
      <ImageBackground source={image} resizeMode="stretch" style={styles.image}>
        <Link style={styles.container2} href="profilePage">
          <Image source={require('../src/components/person-24.png')} style={styles.icon_profile}/>
        </Link>
        <Text style={styles.header}>Welcome to Check Inn!</Text>
        <Text style={styles.text}>Click on the camera icon to bring up the QR scanner{'\n'}</Text>
        <Text style={styles.text}>Scan your room QR to unlock your room with ease!{'\n\n\n\n\n'}</Text>
        <Link style={styles.button} href="qrScannerScreen">
          <Image source={require('../src/components/camera.png')} style={styles.icon_camera}/>
        </Link>
      </ImageBackground>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    display: 'flex',
    flex: 1,
  },
  container2: {
    display: 'flex',
    flex: 0.5,
    alignSelf: 'flex-end',
    marginRight: 10,
  },
  image: {
    flex: 1,
    justifyContent: 'center',
  },
  icon_profile: {
    height: 40,
    width: 40,
  },
  icon_camera: {
    flex: 1,
    width: 60,
    justifyContent: 'center',
  },
  header: {
    marginTop: 100,
    padding: 20,
    fontSize: 28,
    fontWeight: 900,
    textAlign: 'left',
  },
  text: {
    padding: 20,
    fontSize: 20,
    fontWeight: 800,
    textAlign: 'left',
    width: 320,
  },
  button: {
    color: 'white',
    fontSize: 16,
    marginTop: 100,
    alignSelf: 'center',
    backgroundColor: "dodgerblue",
    fontWeight: 700,
    textAlign: 'center',
    paddingVertical: 5,
    width: 80,
    height: 80,
    borderRadius: 80/2
  },
});