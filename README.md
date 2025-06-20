# Git-commands
Her we see all command to use in dailly life.

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


