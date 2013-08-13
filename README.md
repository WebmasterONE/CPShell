CPShell
==========
CPShell is a WHM addon that allows System Administrators to run ssh commands on their RHEL & cPanel/WHM based server without needing ssh.

Features
==========
Run SSH Commands in WHM (Root Only)

Changelog
==========
V1

*Added ability to run ssh commands

Requirements
==========
Cpanel/WHM for VPS or Dedicated Servers

CentOS or any RHEL Based Linux OS

Issues
==========
Does not support "interactive commands". Example: "wget file" or "yum update". Single operation commands do work however, example: "ls -l", "cp filename filename2"
Does not support CD command. if you are going to use it, make sure it is on the same line as what your executing, example: "mkdir test && cd test && touch test.file"