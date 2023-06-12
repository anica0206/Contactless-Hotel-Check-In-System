import React, { useState } from 'react';
import {StyleSheet, View, Pressable, Linking, Text, TextInput, TouchableOpacity, Button} from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import {useRouter} from "expo-router"

export default function Signin() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  
  const router = useRouter();

  const login = () => {
    if((email.length === 0) || (password.length === 0)){
      alert("Required Field Is Missing!");
    } else {
      fetch('http://checkinn.infinityfreeapp.com/php/login.php')
      .then(res => res.json())
      .then(
        (users) => {
          let user = users.find(user => user.email === email && user.password === password);
          if(user) {
            AsyncStorage.setItem('email', user.email.toString());
            router.push("/HomeScreen");
          } else {
            alert("Wrong Email or Password. Please try again");
          }
        },
        (error) => {
          console.log(error);
        }
      )
    };
  }

  return (
    <View style={styles.container}>
        <Text style={styles.header}>Sign In</Text>
        <Text style={styles.text}>Email</Text>
        <TextInput placeholder="Email" style={styles.textinput} onChangeText={text => setEmail(text)}/>
        <Text style={styles.text}>Password</Text>
        <TextInput secureTextEntry={true} placeholder="Password" style={styles.textinput} onChangeText={text => setPassword(text)}/>
        <View style={styles.ButtonView1}>    
        <Pressable onPress={login}>
          <Text style={styles.btn}>Sign In</Text>
        </Pressable>
        </View> 
    </View>
  );
}

//style section
  const styles = StyleSheet.create({
    container: {
        padding: 30,
        flex: 1,
        backgroundColor: '#fff',
      },
    header: {
        marginTop: 90,
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
}) 