import { StyleSheet, Text, View, Button, Alert } from 'react-native';
import React, {useState, useEffect} from 'react';
import * as LocalAuthentication from 'expo-local-authentication'
import {useRouter} from "expo-router"

export default function FingerPrint() {
    const [isBiometricSupported, setIsBiometricSupported] = useState(false);

    const router = useRouter();

    const UnlockDoor = () => {
        return(router.push("/UnlockDoor"));
    }

    const handleBiometricAuth = async () => {
        // Authenticate with biometric
        const biometricAuth = await LocalAuthentication.authenticateAsync({
            promptMessage: 'Login with Biometric',
            cancelLabel : 'Cancel',
            disableDeviceFallback: true,
        });

        // Log in user on success
        if (biometricAuth.success) {
           UnlockDoor();
        }
    };

    // Check for fingerprint scan support
    (async ()=> {
        const compatible = await LocalAuthentication.hasHardwareAsync();
        setIsBiometricSupported(compatible);

        if (compatible) {
            handleBiometricAuth();
        }
    })();

    return(
        <View style={styles.container}>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
    },
});