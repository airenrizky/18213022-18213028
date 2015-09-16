# 18213022-18213028
Integrative Programming 



import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

import javax.swing.JOptionPane;

/**
 * Trivial client for the date server.
 */
public class Client {

    /**
     * Runs the client as an application.  First it displays a dialog
     * box asking for the IP address or hostname of a host running
     * the date server, then connects to it and displays the date that
     * it serves.
     */
    public static void main(String[] args) throws IOException {
//  
        Socket s = new Socket("192.168.1.122", 1234);
 //      
        String message = JOptionPane.showInputDialog("Please enter your message :");
        try {
            PrintWriter out =
                new PrintWriter(s.getOutputStream(), true);
            out.println(message);
        } finally {
            s.close();
        }
        System.exit(0);
    }
}
