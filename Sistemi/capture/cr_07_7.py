from Cryptodome.Cipher import DES
from Cryptodome.Util.Padding import pad
from Cryptodome.Cipher import AES
from Cryptodome.Random import get_random_bytes

key = bytes.fromhex('e6fe4cd3f56a73a2')
cifra = DES.new(key, 'CBC')
plaintext = 'La lunghezza di questa frase non ├¿ divisibile per 8'
tcifrato = cifra.encrypt(pad(bytes(plaintext, 'utf-8'), DES.block_size, 'x923'))

print (tcifrato.hex())
print(bytes.hex(cifra.lv))

kAes = get_random_bytes(int(256/8))