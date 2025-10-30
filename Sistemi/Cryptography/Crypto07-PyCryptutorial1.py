from Cryptodome.Cipher import DES
from Cryptodome.Util.Padding import pad
from Cryptodome.Cipher import AES
from Cryptodome.Random import get_random_bytes
from Cryptodome.Cipher import ChaCha20

key = bytes.fromhex('daaa8b695d17b61a')
cifra = DES.new(key, DES.MODE_CBC)
plaintext = 'La lunghezza di questa frase non è divisibile per 8'
tcifrato = cifra.encrypt(pad(bytes(plaintext, 'utf-8'), DES.block_size, 'x923'))

print (tcifrato.hex())
print(bytes.hex(cifra.iv))

kAes = get_random_bytes(int(256/8))
print(kAes.hex())

cifra = AES.new(kAes, AES.MODE_CFB, segment_size = 24)

plaintext = 'Mi chiedo cosa significhi il numero nel nome di questo algoritmo.'

plainbyte = pad(bytes(plaintext, 'utf-8'), AES.block_size, style= 'pkcs7')

testocifrato = cifra.encrypt(plainbyte)

print(testocifrato.hex())

print(bytes.hex(cifra.iv))

key = bytes.fromhex('1cc108bf255d1e3e67023ab398a0c40e79d97b9f1dc838ccaa37e6ac44a36e39')
nonce = bytes.fromhex('2200929fc44c622e')
ciphertext = bytes.fromhex('224977aea0545bbcebfe4488367eaf3c0a2d39103c4d8ea269570494')

cipher = ChaCha20.new(key=key, nonce=nonce)
plaintext = cipher.decrypt(ciphertext)
print(plaintext)



