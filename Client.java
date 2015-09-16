# 18213022-18213028
Integrative Programming 

package tcp;

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
//        String serverAddress = JOptionPane.showInputDialog(
//            "Enter IP Address of a machine that is\n" +
//            "running the date service on port 9090:");
        Socket s = new Socket("192.168.1.122", 8888);
 //       BufferedReader input =
 //           new BufferedReader(new InputStreamReader(s.getInputStream()));
 //       String answer = input.readLine();
 //       JOptionPane.showMessageDialog(null, answer);
/*        String message = JOptionPane.showInputDialog("Please enter your message :");
        try {
            PrintWriter out =
                new PrintWriter(s.getOutputStream(), true);
            out.println(message);
        } finally {
            s.close();
        }*/
        
        System.out.println("Just connected to " + s.getRemoteSocketAddress()); 
		PrintWriter toServer = 
			new PrintWriter(s.getOutputStream(),true);
		BufferedReader fromServer = 
			new BufferedReader(
					new InputStreamReader(s.getInputStream()));
		toServer.println("Hello from " + s.getLocalSocketAddress()); 
		String line = fromServer.readLine();
		System.out.println("Client received: " + line + " from Server");
		toServer.close();
		fromServer.close();
		s.close();
        
        System.exit(0);
    }
}
