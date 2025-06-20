# Git-commands
Her we see all command to use in dailly life.

<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Add and Commit Files in Git</h2>

  <p>After you initialize a Git repository, files and folders will appear as <strong>untracked</strong>.</p>

  <h3 style="color: #34495e;">🔹 Step 1: Add files to staging area</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git add git-commands
  </pre>

  <p>This tells Git to track the <code>git-commands</code> folder and prepare it for commit.</p>

  <h3 style="color: #34495e;">🔹 Step 2: Commit the files</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60;">
git commit -m "Initial commit with git-commands folder"
  </pre>

  <p>This creates a snapshot of the added files in the Git history.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Navigate Folders using <code>cd</code></h2>

  <p>The <code>cd</code> command is used in Git Bash (and Linux terminals) to move between folders (directories).</p>

  <h3 style="color: #34495e;">🔹 Syntax</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc; border-radius: 5px;">
cd foldername
  </pre>

  <h3 style="color: #34495e;">🔹 Examples</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60; border-radius: 5px;">
cd Documents
cd ..
cd ~
  </pre>

  <ul style="line-height: 1.6;">
    <li><code>cd Documents</code> — Go inside the Documents folder</li>
    <li><code>cd ..</code> — Move up one level (to parent folder)</li>
    <li><code>cd ~</code> — Go to home directory</li>
  </ul>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Clone a Git Repository</h2>

  <p>The <code>git clone</code> command is used to copy a Git repository from a remote server (like GitHub) to your local machine.</p>

  <h3 style="color: #34495e;">🔹 Syntax</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc; border-radius: 5px;">
git clone &lt;repository-url&gt;
  </pre>

  <h3 style="color: #34495e;">🔹 Example</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60; border-radius: 5px;">
git clone https://github.com/octocat/Hello-World.git
  </pre>

  <p>This will download the <code>Hello-World</code> repository into your current folder.</p>

  <p>You can now open the folder, view files, and start working on the project locally.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Set VS Code as Git's Default Editor</h2>

  <p>
    You can configure Git to use <strong>Visual Studio Code</strong> as the default text editor using the command below:
  </p>

  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc; border-radius: 5px;">
git config --global core.editor "code --wait"
  </pre>

  <h3 style="color: #34495e;">🧠 What This Does:</h3>
  <ul style="line-height: 1.6;">
    <li><code>core.editor</code> tells Git which editor to use for commit messages, merge conflicts, etc.</li>
    <li><code>code</code> runs Visual Studio Code.</li>
    <li><code>--wait</code> tells Git to wait until you close VS Code before continuing.</li>
  </ul>

  <p>
    This is especially useful if you want to write commit messages or resolve merge conflicts using the full power of VS Code.
  </p>

  <h3 style="color: #34495e;">✅ To Verify:</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60; border-radius: 5px;">
git config --global --list
  </pre>

  <p>If you see <code>core.editor=code --wait</code> in the list, it's successfully configured.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Set VS Code as Default Git Editor</h2>

  <p>The following command sets Visual Studio Code as your default editor for Git operations:</p>

  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git config --global core.editor "code --wait"
  </pre>

  <p><code>--wait</code> ensures Git pauses until you finish writing your message and close VS Code.</p>

  <p>After setting this, Git will launch VS Code for tasks like writing commit messages.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">View Global Git Configuration</h2>

  <p>The <code>git config --global --list</code> command displays all the global configuration settings you've set in Git.</p>

  <h3 style="color: #34495e;">🔹 Usage</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git config --global --list
  </pre>

  <p>Example output:</p>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60;">
user.name=Your Name
user.email=you@example.com
core.editor=code --wait
  </pre>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Configure Git Globally</h2>
  
  <p>The <code>git config --global</code> command is used to set Git configuration values that apply to all your Git projects on your system.</p>

  <h3 style="color: #34495e;">🔹 Set User Name</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git config --global user.name "Your Name"
  </pre>

  <h3 style="color: #34495e;">🔹 Set User Email</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
git config --global user.email "you@example.com"
  </pre>

  <p>Once set, Git will use this name and email in all commits across your system.</p>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Show Current Directory with <code>pwd</code></h2>
  
  <p>The <code>pwd</code> command is used to display the full path of the current working directory in the terminal.</p>
  
  <h3 style="color: #34495e;">🔹 Usage</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
pwd
  </pre>

  <p>Example output:</p>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60;">
/home/user/Desktop/my-folder
  </pre>
</div>


<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Clear Terminal Screen</h2>
  
  <p>The <code>clear</code> command is used to clean the terminal window by removing all previous outputs.</p>

  <h3 style="color: #34495e;">🔹 Usage</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
clear
  </pre>

  <p>You can also use the keyboard shortcut <kbd>Ctrl</kbd> + <kbd>L</kbd> in most terminals.</p>
</div>

<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Check Git Version</h2>
  <p style="margin: 10px 0;">
    To check the version of Git installed on your system, use the following command:
  </p>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc; color: #000;">
git --version
  </pre>
</div>

<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">Download Git Bash</h2>
  <p style="margin-bottom: 10px;">
    To use Git on your system, you need to install Git Bash. Click the link below to download it:
  </p>
  <a href="https://git-scm.com/downloads" target="_blank" 
     style="display: inline-block; background-color: #28a745; color: white; padding: 10px 15px; 
            text-decoration: none; border-radius: 5px;">
    Download Git Bash
  </a>
</div>

<div style="font-family: Arial, sans-serif; font-size: 16px; color: #333;">
  <h2 style="color: #2c3e50;">List Files and Directories using <code>ls</code></h2>
  
  <p>The <code>ls</code> command is used to list files and directories in the current working directory.</p>
  
  <h3 style="color: #34495e;">🔹 Basic Usage</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #007acc;">
ls
  </pre>
  
  <h3 style="color: #34495e;">🔹 Common Options</h3>
  <ul style="line-height: 1.6;">
    <li><code>ls -l</code> — Shows detailed info (permissions, size, date)</li>
    <li><code>ls -a</code> — Shows hidden files (those starting with <code>.</code>)</li>
    <li><code>ls -la</code> — Combines <code>-l</code> and <code>-a</code></li>
    <li><code>ls -lh</code> — Shows human-readable file sizes</li>
    <li><code>ls foldername/</code> — Lists contents of a specific folder</li>
  </ul>

  <h3 style="color: #34495e;">🔍 Example</h3>
  <pre style="background-color: #f4f4f4; padding: 10px; border-left: 4px solid #27ae60;">
ls -la
  </pre>
</div>


