import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, TextInput, View} from 'react-native';
import {Link} from "expo-router"
import React, { useEffect, useState } from 'react';

export default function SignInScreen() {
    return (
        <View style={styles.container}>
          <Text style={styles.header}>Sign In</Text>
          <Text style={styles.text}>Email</Text>
          <TextInput placeholder="Email" style={styles.textinput}/>
          <Text style={styles.text}>Password</Text>
          <TextInput secureTextEntry={true} placeholder="Password" style={styles.textinput}/>
          <Link href="/HomeScreen"style={styles.btn} >Sign In</Link>
        </View>
      );
    }
    
const styles = StyleSheet.create({
  container: {
      padding: 30,
      flex: 1,
      backgroundColor: '#fff',
    },
  header: {
      marginTop: 50,
      marginBottom: 20,
      padding: 10,
      fontSize: 28,
      fontWeight: 700,
      textAlign: 'left',
      width: 300,
    },
  text: {
      padding: 10,
      fontSize: 16,
      marginTop: 10,
      fontWeight: 500,
      textAlign: 'left',
      width: 300,
    },
  textinput: {
      marginLeft: 10,
      padding: 10,
      height: 50,
      borderWidth: 1,
      fontSize: 15,
      textAlign: 'left',
      width: 300,
      borderRadius: 5,
    },
    btn: {
      color: 'white',
      fontSize: 16,
      marginTop: 50,
      marginLeft: 10,
      backgroundColor: "dodgerblue",
      borderRadius: 5,
      width: 300,
      height: 40,
      fontWeight: 700,
      textAlign: 'center',
      paddingVertical: 10,
    },
});