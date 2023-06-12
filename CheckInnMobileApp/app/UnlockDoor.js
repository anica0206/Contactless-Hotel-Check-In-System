import React, { useRef, useEffect } from 'react';
import { StyleSheet, View, Text } from 'react-native';
import AnimatedLottieView from "lottie-react-native";
import {Link} from "expo-router"

export default function UnlockDoor() {
  
  const lottieRef = useRef(null);
    useEffect(() => {
        lottieRef.current?.reset();
        setTimeout(() => {
            lottieRef.current?.play();
        }, 0)

    }, []);
    // fix end

    return(
      <View style={styles.animationContainer}>
        <Text style={styles.text}>Succesfully Unlocked!</Text>
        <AnimatedLottieView
            source={require('../src/components/checktick.json')}
            autoPlay
            loop
            style={{
            width: 200,
            height: 200,
            backgroundColor: '#eee',
          }}
            ref={lottieRef}
        />
        <Link href="HomeScreen" style={styles.btn}> Back to Home 
        </Link>
      </View>
    );
}

const styles = StyleSheet.create({
  animationContainer: {
    backgroundColor: '#fff',
    alignItems: 'center',
    flex: 1,
  },
  btn: {
    color: 'white',
    fontSize: 18,
    marginTop: 100,
    backgroundColor: "dodgerblue",
    borderRadius: 5,
    width: 300,
    height: 46,
    fontWeight: 700,
    textAlign: 'center',
    paddingVertical: 10,
  },
  text: {
    fontSize: 18,
    marginTop: 100,
    fontWeight: 800,
    textAlign: 'center',
    marginBottom: 100,
    marginTop: 140,
  },
});