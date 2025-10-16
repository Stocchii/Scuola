from base64 import b64decode

str = 'ZmxhZ3t3NDF0XzF0c19hbGxfYjE='
flag_1 = b64decode(str)


num = 664813035583918006462745898431981286737635929725


from math import log

flag_2 = (num).to_bytes(20, 'big')

print (flag_1 + flag_2)



