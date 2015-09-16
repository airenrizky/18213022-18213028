import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Date;

import javax.swing.JOptionPane;

/**
 * A TCP server that runs on port 9090.  When a client connects, it
 * sends the client the current date and time, then closes the
 * connection with that client.  Arguably just about the simplest
 * server you can write.
 */
public class Server {

    /**
     * Runs the server.
     */
    public static void main(String[] args) throws IOException {
        ServerSocket listener = new ServerSocket(9090);
        try {
            while (true) {
                Socket socket = listener.accept();

    			System.out.println("Waiting for client on port " + listener.getLocalPort() + "..."); 
    			System.out.println("Just connected to " + socket.getRemoteSocketAddress()); 

    			PrintWriter toClient = 
    				new PrintWriter(socket.getOutputStream(),true);
    			BufferedReader fromClient =
    				new BufferedReader(
    						new InputStreamReader(socket.getInputStream()));
    			String line = fromClient.readLine();
    			System.out.println("Server received: " + line); 
    			toClient.println("Thank you for connecting to " + socket.getLocalSocketAddress() + "\nGoodbye!"); 

            }
        }
        finally {
            listener.close();
        }
    }
}
