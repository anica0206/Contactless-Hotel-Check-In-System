import React, {useRef} from 'react';
import { StyleSheet, View, Image, Pressable, Linking, Text, TextInput, TouchableOpacity, Button} from 'react-native';
import { WebView } from 'react-native-webview';


export default function YourComponent() {
  const onMessage = (event) => {
    const data = event.nativeEvent.data
    //const data = JSON.parse(event.nativeEvent.data);
    console.log(data);
  }

  return (
    <WebView
      source={{ uri: 'http://checkinn.infinityfreeapp.com/php/test.html' }}
      onMessage={onMessage}
      style={{ marginTop: 20 }}
    />
  );
}

//style section 
//const styles = StyleSheet.create({
//  container: {
//    flex: 1,
//  },
//})