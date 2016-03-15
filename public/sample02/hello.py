import time

file = "./tmp/hello.txt"
f = open(file,"w")
f.close()

L = range(0,10) 

for x in L:
#  print "Hello " + str(x)
  f = open(file, 'a')
  f.writelines( "Hello " + str(x) + "\n")
  f.close()
  time.sleep(1)

