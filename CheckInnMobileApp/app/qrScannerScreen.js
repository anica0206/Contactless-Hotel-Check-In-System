import React, { useState, useEffect } from 'react';
import { Text, View, StyleSheet, Button, Alert, Pressable} from 'react-native';
import { BarCodeScanner } from 'expo-barcode-scanner';
import {useRouter} from "expo-router"
import AsyncStorage from '@react-native-async-storage/async-storage';

export default function QRScannerScreen({navigation}) {
  const router = useRouter();

  const [hasPermission, setHasPermission] = useState(null);
  const [scanned, setScanned] = useState(false);
  const [text, setText] = useState('Please Scan the QR code')
  //const [text, setText] = useState('hbs_1')
  const [email, setEmail] = useState(''); // Add email stat

  const askForCameraPermission = () => {
    (async () => {
      const { status } = await BarCodeScanner.requestPermissionsAsync();
      setHasPermission(status === 'granted');
    })()
  }

  // Request Camera Permission
  useEffect(() => {
    askForCameraPermission();
    getEmailFromAsyncStorage(); // Call the function to get email from AsyncStorage
  }, []);

  // Function to get email from AsyncStorage
  const getEmailFromAsyncStorage = async () => {
    try {
      const value = await AsyncStorage.getItem('email');
      if(value !== null) {
        setEmail(value);
      }
    } catch(e) {
      // Error reading value
      console.log(e);
    }
  }

  // What happens when we scan the bar code
  const handleBarCodeScanned = ({ type, data }) => {
    setScanned(true);
    setText(data)
    console.log('Type: ' + type + '\nData: ' + data)
  };


  // Check permissions and return the screens
  if (hasPermission === null) {
    return (
      <View style={styles.container}>
        <Text>Requesting for camera permission</Text>
      </View>)
  }
  if (hasPermission === false) {
    return (
      <View style={styles.container}>
        <Text style={{ margin: 10 }}>No access to camera</Text>
        <Button title={'Allow Camera'} onPress={() => askForCameraPermission()} />
      </View>)
  }

  const validateBooking = (email, room_id) => {
    fetch(`http://checkinn.infinityfreeapp.com/php/bookings.php`)
      .then(response => {
        if (!response.ok) { throw new Error("HTTP status " + response.status); }
        return response.json();
      })
      .then(data => {
        //console.log(data);

        // Get today's date
        const today = new Date();
        today.setHours(0,0,0,0); // Reset hours, minutes, seconds and milliseconds
  
        // Filter bookings with the given email and room_id, and where today is between check-in and check-out
        const validBookings = data.filter(booking => {
          const checkInDate = new Date(booking.checkInDate);
          checkInDate.setHours(0,0,0,0);
          const checkOutDate = new Date(booking.checkOutDate);
          checkOutDate.setHours(0,0,0,0);
  
          return booking.email === email && booking.roomid === room_id && 
                 today >= checkInDate && today <= checkOutDate;
        });
        
        if (validBookings.length > 0) {
          router.push("/FingerPrint");
          // do something with the valid bookings
        } else {
          alert('No Bookings Found');
        }
      })
      .catch(error => {
        console.log('Fetch error: ', error);
      });
  }

  // Return the View
  return (
    <View style={styles.container}>
      <View style={styles.barcodebox}>
        <BarCodeScanner
          onBarCodeScanned={scanned ? undefined : handleBarCodeScanned}
          style={{ height: 400, width: 400 }} />
      </View>
      <Text style={styles.maintext}>{text}</Text>
      {scanned && <Button title={'Rescan'} onPress={() => setScanned(false)} color='tomato' />}
      <Pressable onPress={() => validateBooking(email, text)}>
        <Text style={styles.btntxt}>Confirm</Text>
      </Pressable>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  maintext: {
    fontSize: 16,
    margin: 20,
  },
  barcodebox: {
    alignItems: 'center',
    justifyContent: 'center',
    height: 300,
    width: 300,
    overflow: 'hidden',
    borderRadius: 30,
    backgroundColor: 'tomato'
  },
  btntxt: {
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