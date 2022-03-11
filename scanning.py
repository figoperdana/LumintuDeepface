
#usr/bin/python
import sys
import codecs

from deepface import DeepFace
img1 = (sys.argv[1])
img2 = (sys.argv[2])
img1_path = "upload/" + img1
img2_path = "temporary/" + img2
model_name = "Facenet"
resp = DeepFace.verify(img1_path , img2_path , model_name=model_name)
a = resp["verified"]
#print("Verified : ",a)
ab = resp["distance"]
if a == True:
    output = codecs.open("success.html", "r", "utf-8")
    print(output.read())
else:
    output = "Tidak hadir"

#print("Distance : ",ab)
#print("Threshold : ",resp["threshold"])
#print("Detector Backend : ",resp["detector_backend"])
#print("Similarity Metric : ",resp["similarity_metric"])
print (output)
