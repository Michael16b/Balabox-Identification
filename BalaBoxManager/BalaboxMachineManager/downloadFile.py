import requests
import shutil
from tqdm.auto import tqdm



def download(url, filename):
    with requests.get(url, stream=True) as r:
        total_length = int(r.headers.get("Content-Length"))
        with tqdm.wrapattr(r.raw, "read", total=total_length, desc="")as raw:
            with open(filename, "wb") as output:
                shutil.copyfileobj(raw, output)
                



#download("http://misc.finxol.io/moodlebox.gz", "moodlebox.gz")
#download("http://terminale-colbert-lorient.fr/download/8052/?tmstv=1669851024", "Moodlebox.ova")


