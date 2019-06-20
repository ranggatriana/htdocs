package com.example.androidsmsgateway;

import org.java_websocket.WebSocket;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * @author Eko Khannedy
 */
public class SmsGatewayContainer {
    /**
     * org.java_websocket.WebSocket adalah implementasi WebSocket client
     * di Java-WebSocket
     */
    private static List<WebSocket> sockets = new ArrayList<WebSocket>();
    /**
     * Menambah WebSocket client ke container
     *
     * @param socket WebSocket client
     */
    public static void add(WebSocket socket) {
        sockets.add(socket);
    }
    /**
     * Menghapus WebSocket client dari container
     *
     * @param socket WebSocket client
     */
    public static void remove(WebSocket socket) {
        sockets.remove(socket);
    }
    /**
     * Menggirim pesan dari server ke client
     *
     * @param message pesan
     */
    public static void send(String message) {
        for (WebSocket socket : sockets) {
            socket.send(message);
        }
    }
    public static void notification(String message, boolean success) {
        Map<String, Object> map = new HashMap<String, Object>();
        map.put("type", "notification");
        map.put("message", message);
        map.put("success", success);
        JSONObject response = new JSONObject(map);
    // panggil metode send
        send(response.toString());
    }
}
