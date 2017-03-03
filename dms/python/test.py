#!/usr/bin/python
print ""
import docx2txt
import cgitb
import cgi
import sys

cgitb.enable()  # for troubleshooting
reload(sys)
sys.setdefaultencoding('utf-8')

file = sys.argv[0]

test = docx2txt.process(file)
textdocument = open(file + ".txt", "w")
text = ""
for ch in test:
    text += ch

textdocument.write(text)
textdocument.close()

print "hello"