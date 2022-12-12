import urllib.request

url  = 'https://upload.wikimedia.org/wikipedia/commons/b/b6/Image_created_with_a_mobile_phone.png'
print("Downloading file from %s" % url)

filename, headers = urllib.request.urlretrieve(url, filename="test.png")

print("Downloaded file to %s" % filename)
print("Headers: %s" % headers)