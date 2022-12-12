import requests
import shutil
from tqdm.auto import tqdm



def downloadFile(url, filename):
    with requests.get(url, stream=True) as r:
        total_length = int(r.headers.get("Content-Length"))
        with tqdm.wrapattr(r.raw, "read", total=total_length, desc="")as raw:
            with open(filename, "wb") as output:
                shutil.copyfileobj(raw, output)
                



downloadFile("http://misc.finxol.io/moodlebox.gz", "moodlebox.gz")


