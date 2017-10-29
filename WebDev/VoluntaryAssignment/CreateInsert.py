from __future__ import print_function
import os,sys
path = "/wamp64/www/gemh/Files"
dirs = os.listdir( path )
writefile=open("C:\wamp64\www\gemh\inserts.txt",'w',encoding='utf8')
# This would print all the files and directories
insert="INSERT INTO `files` (`File_Name`, `File_Status`, `File_id`, `File_user`) VALUES ('"
insert2="', '1', NULL, '');"

for file in dirs:
  if file.startswith('--'):
    newFileName = file[2:]
    os.rename(path+'/'+file, path+'/'+newFileName)
    file = newFileName
  print(insert+file+insert2,file=writefile)

writefile.close