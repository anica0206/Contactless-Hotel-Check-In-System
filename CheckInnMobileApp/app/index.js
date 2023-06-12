import { StatusBar } from 'expo-status-bar';
import { Pressable, ImageBackground, StyleSheet, Text, View } from 'react-native';
import {Link} from "expo-router"
import {useState} from 'react';


export default function WelcomeScreen() {
    const image = require('../src/components/Background.png')
  return (
    <View style={styles.container}>
    <ImageBackground source={image} resizeMode="stretch" style={styles.image}>
      <Text style={styles.header}>Welcome to Check Inn!</Text>
      <Text style={styles.text}>Login with your Check Inn account to start scanning to enter your hotel rooms {'\n\n\n\n\n\n\n\n\n'}</Text>
      <Link href="SignInScreen" style={styles.btn}> Sign In 
      </Link>
    </ImageBackground>
  </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
  image: {
    flex: 1,
    justifyContent: 'center',
  },
  header: {
    marginTop: 50,
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
    width: 300,
  },
  btn: {
    color: 'white',
    fontSize: 16,
    marginTop: 100,
    marginLeft: 50,
    backgroundColor: "dodgerblue",
    borderRadius: 5,
    width: 300,
    height: 40,
    fontWeight: 700,
    textAlign: 'center',
    paddingVertical: 10,
  },
});