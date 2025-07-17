import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.DefaultTableCellRenderer;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.*;
import java.util.ArrayList;
import java.util.List;

public class PrincipalAgenda {
    public static void main(String args[]) {
        TelaPrincipalAgenda tela = new TelaPrincipalAgenda();
    }
}

class TelaPrincipalAgenda extends JFrame {
    public TelaPrincipalAgenda() {
        setTitle("Agenda");
        setSize(850, 500);
        setLocation(250, 250);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        getContentPane().add(new TelaContentPane());
        setVisible(true);
    }
}

class TelaContentPane extends JPanel {
    JLabel banner;
    JTextField jtCodigo, jtNome, jtEndereco, jtTelefone;
    JTextArea jtaAnotacoes;
    JButton jbIncluir, jbConsultar, jbAlterar, jbExcluir, jbLimpar, jbProximo, jbAnterior;
    JTable tabelaContatos;
    DefaultTableModel modeloTabela;
    Agenda agenda;

    private List<Contato> contatosEncontrados;
    private int indiceConsulta;

    public TelaContentPane() {
        agenda = Agenda.carregarDados();
        setLayout(new BorderLayout());
        montarBanner();
        montarDadosPessoaAgenda();
        montarTabela();
        adicionarListeners();
    }

    private void montarBanner() {
        banner = new JLabel(new ImageIcon("banner.jpeg"));
        banner.setPreferredSize(new Dimension(998, 238));

        JPanel jpBanner = new JPanel();
        jpBanner.setLayout(new FlowLayout(FlowLayout.CENTER));
        jpBanner.add(banner);
        jpBanner.setBackground(Color.GREEN);
        this.add(jpBanner, BorderLayout.NORTH);
    }

    private void montarDadosPessoaAgenda() {
        JPanel jpCodigo = new JPanel();
        jpCodigo.setLayout(new FlowLayout());
        jpCodigo.add(new JLabel("Código    "));
        jtCodigo = new JTextField(15);
        jpCodigo.add(jtCodigo);

        JPanel jpNome = new JPanel();
        jpNome.setLayout(new FlowLayout());
        jpNome.add(new JLabel("Nome      "));
        jtNome = new JTextField(15);
        jpNome.add(jtNome);

        JPanel jpEndereco = new JPanel();
        jpEndereco.setLayout(new FlowLayout());
        jpEndereco.add(new JLabel("Endereço"));
        jtEndereco = new JTextField(15);
        jpEndereco.add(jtEndereco);

        JPanel jpTelefone = new JPanel();
        jpTelefone.setLayout(new FlowLayout());
        jpTelefone.add(new JLabel("Telefone "));
        jtTelefone = new JTextField(15);
        jpTelefone.add(jtTelefone);

        JPanel jpGrupoDados = new JPanel();
        jpGrupoDados.setLayout(new BoxLayout(jpGrupoDados, BoxLayout.Y_AXIS));
        jpGrupoDados.add(Box.createVerticalStrut(15));
        jpGrupoDados.add(new JLabel("DADOS PESSOA"));
        jpGrupoDados.add(Box.createVerticalStrut(15));
        jpGrupoDados.add(jpCodigo);
        jpGrupoDados.add(jpNome);
        jpGrupoDados.add(jpEndereco);
        jpGrupoDados.add(jpTelefone);

        JPanel jpGrupoAnotacoes = new JPanel();
        jpGrupoAnotacoes.setLayout(new BoxLayout(jpGrupoAnotacoes, BoxLayout.Y_AXIS));
        jpGrupoAnotacoes.add(Box.createVerticalStrut(15));
        JPanel jpCentralizarJLabel = new JPanel();
        jpCentralizarJLabel.setLayout(new FlowLayout(FlowLayout.CENTER));
        jpCentralizarJLabel.add(new JLabel("ANOTAÇÕES"));
        jpGrupoAnotacoes.add(jpCentralizarJLabel);
        jpGrupoAnotacoes.add(Box.createVerticalStrut(16));


        jtaAnotacoes = new JTextArea(10, 15);
        jtaAnotacoes.setLineWrap(true);
        jtaAnotacoes.setWrapStyleWord(true);
        JScrollPane scrollAnotacoes = new JScrollPane(jtaAnotacoes);
        jpGrupoAnotacoes.add(scrollAnotacoes);
        jpGrupoAnotacoes.add(Box.createVerticalStrut(10));

        JPanel jpDadosPessoa = new JPanel();
        jpDadosPessoa.setLayout(new BoxLayout(jpDadosPessoa, BoxLayout.X_AXIS));
        jpDadosPessoa.add(jpGrupoDados);
        jpDadosPessoa.add(jpGrupoAnotacoes);

        JPanel botoes = new JPanel();
        botoes.setLayout(new FlowLayout());
        jbIncluir = new JButton("Incluir");
        jbConsultar = new JButton("Consultar");
        jbAlterar = new JButton("Alterar");
        jbExcluir = new JButton("Excluir");
        jbLimpar = new JButton("Limpar");
        botoes.add(jbIncluir);
        botoes.add(jbConsultar);
        botoes.add(jbAlterar);
        botoes.add(jbExcluir);
        botoes.add(jbLimpar);

        jbProximo = new JButton("Próximo");
        jbProximo.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                proximoContato();
            }
        });
        botoes.add(jbProximo);

        jbAnterior = new JButton("Anterior");
        jbAnterior.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                anteriorContato();
            }
        });
        botoes.add(jbAnterior);

        JPanel jpDadosPessoaBotoes = new JPanel();
        jpDadosPessoaBotoes.setLayout(new BoxLayout(jpDadosPessoaBotoes, BoxLayout.Y_AXIS));
        jpDadosPessoaBotoes.add(jpDadosPessoa);
        jpDadosPessoaBotoes.add(botoes);
        jpDadosPessoaBotoes.add(Box.createVerticalStrut(400));

        this.add(jpDadosPessoaBotoes, BorderLayout.WEST);
    }

    private void montarTabela() {
        String[] colunas = {"Código", "Nome", "Endereço", "Telefone", "Anotações"};
        modeloTabela = new DefaultTableModel(colunas, 0);
        tabelaContatos = new JTable(modeloTabela);

        tabelaContatos.setDefaultRenderer(Object.class, new RendererTabela());

        JScrollPane scrollPane = new JScrollPane(tabelaContatos);
        this.add(scrollPane, BorderLayout.CENTER);

        listarContatos();
    }

    private void adicionarListeners() {
        jbIncluir.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                incluirContato();
            }
        });

        jbConsultar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                consultarContato();
            }
        });

        jbAlterar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                alterarContato();
            }
        });

        jbExcluir.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                excluirContato();
            }
        });

        jbLimpar.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                limparCampos();
            }
        });
    }

    private void incluirContato() {
        if (jtNome.getText().isEmpty() || jtEndereco.getText().isEmpty() || jtTelefone.getText().isEmpty()) {
            JOptionPane.showMessageDialog(this, "Os campos Nome, Telefone e Endereço são obrigatórios.");
            return;
        }

        Contato c = new Contato();
        c.setNome(jtNome.getText());
        c.setEndereco(jtEndereco.getText());
        c.setTelefone(jtTelefone.getText());
        c.setAnotacoes(jtaAnotacoes.getText());
        agenda.inserir(c);
        agenda.salvarDados();
        listarContatos();
        limparCampos();
    }

    private void consultarContato() {
        String codigo = jtCodigo.getText().trim();
        String nome = jtNome.getText().trim();

        if (!codigo.isEmpty() && !nome.isEmpty()) {
            JOptionPane.showMessageDialog(this, "Informe apenas o código ou o nome para a consulta.");
            return;
        }

        if (!codigo.isEmpty()) {
            Contato c = agenda.consultarPorCodigo(codigo);
            if (c != null) {
                preencherCampos(c);
            } else {
                JOptionPane.showMessageDialog(this, "Contato não encontrado.");
            }
        } else if (!nome.isEmpty()) {
            contatosEncontrados = agenda.consultarPorNome(nome);
            if (!contatosEncontrados.isEmpty()) {
                indiceConsulta = 0;
                preencherCampos(contatosEncontrados.get(indiceConsulta));
            } else {
                JOptionPane.showMessageDialog(this, "Contato não encontrado.");
            }
        } else {
            JOptionPane.showMessageDialog(this, "Informe o código ou o nome para a consulta.");
        }
    }

    private void alterarContato() {
        String codigo = jtCodigo.getText().trim();
        String nome = jtNome.getText().trim();
        String telefone = jtTelefone.getText().trim();
        String endereco = jtEndereco.getText().trim();

        if (codigo.isEmpty()) {
            JOptionPane.showMessageDialog(this, "O campo Código é obrigatório para alteração.");
            return;
        }

        if (nome.isEmpty() || endereco.isEmpty() || telefone.isEmpty()) {
            JOptionPane.showMessageDialog(this, "Os campos Nome, Endereço e Telefone são obrigatórios para alteração.");
            return;
        }

        Contato c = new Contato();
        c.setCodigo(codigo);
        c.setNome(nome);
        c.setEndereco(endereco);
        c.setTelefone(telefone);
        c.setAnotacoes(jtaAnotacoes.getText());

        agenda.alterar(c);
        agenda.salvarDados();
        listarContatos();
        limparCampos();
    }

    private void excluirContato() {
        String codigo = jtCodigo.getText().trim();
        if (codigo.isEmpty()) {
            JOptionPane.showMessageDialog(this, "Informe o código do contato a ser excluído.");
            return;
        }

        agenda.excluir(codigo);
        agenda.salvarDados();
        listarContatos();
        limparCampos();
    }

    private void limparCampos() {
        jtCodigo.setText("");
        jtNome.setText("");
        jtEndereco.setText("");
        jtTelefone.setText("");
        jtaAnotacoes.setText("");
    }

    private void preencherCampos(Contato c) {
        jtCodigo.setText(c.getCodigo());
        jtNome.setText(c.getNome());
        jtEndereco.setText(c.getEndereco());
        jtTelefone.setText(c.getTelefone());
        jtaAnotacoes.setText(c.getAnotacoes());
    }

    private void listarContatos() {
        modeloTabela.setRowCount(0); // Limpar tabela
        List<Contato> contatos = agenda.listarContatos();
        for (Contato c : contatos) {
            Object[] rowData = {c.getCodigo(), c.getNome(), c.getEndereco(), c.getTelefone(), c.getAnotacoes()};
            modeloTabela.addRow(rowData);
        }

        // Destacar a última linha adicionada com cor azul
        if (contatos.size() > 0) {
            int ultimaLinha = contatos.size() - 1;
            tabelaContatos.setDefaultRenderer(Object.class, new DefaultTableCellRenderer() {
                @Override
                public Component getTableCellRendererComponent(JTable table, Object value, boolean isSelected, boolean hasFocus, int row, int column) {
                    Component cell = super.getTableCellRendererComponent(table, value, isSelected, hasFocus, row, column);
                    if (row == ultimaLinha) {
                        cell.setBackground(new Color(173,216,230));
                    } else {
                        cell.setBackground(row % 2 == 0 ? Color.WHITE : new Color(240, 240, 240));
                    }
                    return cell;
                }
            });
        } else {
            tabelaContatos.setDefaultRenderer(Object.class, new RendererTabela());
        }
    }

    private void proximoContato() {
        if (contatosEncontrados != null && indiceConsulta < contatosEncontrados.size() - 1) {
            indiceConsulta++;
            preencherCampos(contatosEncontrados.get(indiceConsulta));
        }
    }

    private void anteriorContato() {
        if (contatosEncontrados != null && indiceConsulta > 0) {
            indiceConsulta--;
            preencherCampos(contatosEncontrados.get(indiceConsulta));
        }
    }
}

class RendererTabela extends DefaultTableCellRenderer {
    private static final long serialVersionUID = 1L;

    @Override
    public Component getTableCellRendererComponent(JTable table, Object value, boolean isSelected, boolean hasFocus, int row, int column) {
        Component cell = super.getTableCellRendererComponent(table, value, isSelected, hasFocus, row, column);

        // Define cores alternadas para as linhas da tabela
        if (row % 2 == 0) {
            cell.setBackground(Color.WHITE);
        } else {
            cell.setBackground(new Color(240, 240, 240));
        }

        return cell;
    }
}

class Contato implements Serializable {
    private static final long serialVersionUID = 1L;

    private String codigo;
    private String nome;
    private String endereco;
    private String telefone;
    private String anotacoes;

    public Contato() {
    }

    public String getCodigo() {
        return codigo;
    }

    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getEndereco() {
        return endereco;
    }

    public void setEndereco(String endereco) {
        this.endereco = endereco;
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }

    public String getAnotacoes() {
        return anotacoes;
    }

    public void setAnotacoes(String anotacoes) {
        this.anotacoes = anotacoes;
    }
}

class Agenda implements Serializable {
    private static final long serialVersionUID = 1L;

    private List<Contato> contatos;
    private int ultimoCodigo;

    public Agenda() {
        contatos = new ArrayList<>();
        ultimoCodigo = 1;
    }

    public void inserir(Contato c) {
        c.setCodigo("A" + ultimoCodigo++);
        contatos.add(c);
    }

    public Contato consultarPorCodigo(String codigo) {
        for (Contato c : contatos) {
            if (c.getCodigo().equalsIgnoreCase(codigo)) {
                return c;
            }
        }
        return null;
    }

    public List<Contato> consultarPorNome(String nome) {
        List<Contato> resultados = new ArrayList<>();
        for (Contato c : contatos) {
            if (c.getNome().equalsIgnoreCase(nome)) {
                resultados.add(c);
            }
        }
        return resultados;
    }

    public void alterar(Contato c) {
        for (Contato contato : contatos) {
            if (contato.getCodigo().equals(c.getCodigo())) {
                contato.setNome(c.getNome());
                contato.setEndereco(c.getEndereco());
                contato.setTelefone(c.getTelefone());
                contato.setAnotacoes(c.getAnotacoes());
                break;
            }
        }
    }

    public void excluir(String codigo) {
        contatos.removeIf(c -> c.getCodigo().equals(codigo));
    }

    public List<Contato> listarContatos() {
        return contatos;
    }

    public void salvarDados() {
        try (ObjectOutputStream oos = new ObjectOutputStream(new FileOutputStream("agenda.dat"))) {
            oos.writeObject(this);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public static Agenda carregarDados() {
        File file = new File("agenda.dat");
        if (!file.exists()) {
            return new Agenda();
        }

        try (ObjectInputStream ois = new ObjectInputStream(new FileInputStream(file))) {
            return (Agenda) ois.readObject();
        } catch (IOException | ClassNotFoundException e) {
            e.printStackTrace();
            return new Agenda();
        }
    }
}
