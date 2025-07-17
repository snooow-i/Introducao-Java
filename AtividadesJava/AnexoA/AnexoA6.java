public class AnexoA6 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite uma URL:");
        String url = scanner.nextLine();
        
        boolean startsWithURL = isURL(url);
        
        if (startsWithURL) {
            System.out.println("A URL começa com 'http:', 'ftp:' ou 'https:'.");
        } else {
            System.out.println("A URL não começa com 'http:', 'ftp:' ou 'https:'.");
        }
    }
    
    public static boolean isURL(String url) {
        return url.startsWith("http:") || url.startsWith("https:") || url.startsWith("ftp:");
    }
}
