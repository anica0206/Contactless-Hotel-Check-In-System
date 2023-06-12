import React, { useState, useEffect } from 'react';
import { Text, View, StyleSheet, ImageBackground, Alert, Pressable, Image} from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import {Link} from "expo-router"

export default function ProfilePage() {

  const [email, setEmail] = useState(''); // Add email stat
  const [name, setName] = useState('');
  const [dateOfBirth, setDateOfBirth] = useState('');

  const getEmailFromAsyncStorage = async () => {
    try {
      const value = await AsyncStorage.getItem('email');
      if(value !== null) {
        setEmail(value);
        getProfile(value);
      }
    } catch(e) {
      // Error reading value
      console.log(e);
    }
  }

  useEffect(() => {
    getEmailFromAsyncStorage(); 
  }, []);

  const image = require('../src/components/home_bg.png') 

  const getProfile = (email) => {
    fetch(`http://checkinn.infinityfreeapp.com/php/profile.php`)
      .then(response => {
        if (!response.ok) { throw new Error("HTTP status " + response.status); }
        return response.json();
      })
      .then(data => {
        const user = data.find(user => user.email === email);
        if (user) {
          setName(user.name);
          setEmail(user.email);
          setDateOfBirth(user.dateOfBirth);
        }
      })
      .catch(error => {
        console.log('Fetch error: ', error);
      });
  }

  return (
    <View style={styles.container}>
        <ImageBackground source={image} resizeMode="stretch" style={styles.image}>
            <Link style={styles.containerIcon} href="HomeScreen">
                <Image source={require('../src/components/back-1.png')} style={styles.icon}/>
            </Link>
            <Text style={styles.header}>My Profile{'\n'}</Text>
            <View style={styles.container2}>
                <Text style={styles.circle}></Text>
                    <View style={styles.container}>
                        <Text style={styles.text}>{name}</Text>
                        <Text style={styles.text}>{email}</Text>
                    </View>
            </View>
            <View style={styles.border}/>
            <Text style={styles.text3}>Full Name</Text>
            <Text style={styles.text3}>{name}</Text>
            <View style={styles.border2}/>
            <Text style={styles.text3}>Email</Text>
            <Text style={styles.text3}>{email}</Text>
            <View style={styles.border2}/>
            <Text style={styles.text3}>Date of Birth</Text>
            <Text style={styles.text3}>{dateOfBirth}</Text> 
            <View style={styles.border2}/>
            <Link style={styles.button} href="SignInScreen"> Sign Out
            </Link>
            <Text style={styles.text3}>{'\n\n\n\n'}</Text>
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
    flexDirection: 'row',
    flex: 1.5,
  },
  containerIcon: {
    padding: 10,
    display: 'flex',
    flex: 0.5,
  },
  image: {
    flex: 1,
  },
  header: {
    fontSize: 28,
    fontWeight: 900,
    textAlign: 'center',
  },
  text: {
    marginTop: 10,
    marginLeft: 10,
    padding: 5,
    fontSize: 16,
    fontWeight: 600,
    textAlign: 'left',
    width: 320,
  },
  text2: {
    color: '#2c2c2c',
    marginLeft: 10,
    padding: 5,
    fontSize: 16,
    fontWeight: 800,
    textAlign: 'left',
    width: 320,
  },
  text3: {
    marginLeft: 15,
    marginTop: 5,
    fontSize: 14,
    fontWeight: 500,
    textAlign: 'left',
    width: 320,
  },
  circle: {
    marginLeft: 20,
    color: 'white',
    fontSize: 16,
    alignSelf: 'flex-start',
    backgroundColor: "white",
    fontWeight: 700,
    textAlign: 'center',
    paddingVertical: 5,
    width: 100,
    height: 100,
    borderRadius: 100/2
  },
  button: {
    fontSize: 16,
    marginTop: 100,
    alignSelf: 'center',
    borderColor: '#2c2c2c',
    borderRadius: 15,
    borderWidth: 2,
    width: 200,
    height: 40,
    fontWeight: 400,
    textAlign: 'center',
    paddingVertical: 9,
  },
  icon: {
    width: 30,
    height: 40,
  },
  border: {
    marginTop: 20,
    marginBottom: 10,
    borderBottomColor: 'black',
    borderBottomWidth: 0.8,
  },
  border2: {
    marginTop: 10,
    marginBottom: 10,
    borderBottomColor: 'white',
    borderBottomWidth: 1,
  },
});