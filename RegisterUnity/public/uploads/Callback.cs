using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEditor.TestTools;
using UnityEditor.TestTools.TestRunner;
using UnityEditor.TestTools.TestRunner.Api;
using UnityEngine.TestRunner;
using UnityEngine.TestTools;
using UnityEngine.TestTools.Constraints;
using UnityEngine.TestTools.Utils;
using UnityEngine.Networking;
using System.Linq;



public class Callback : ICallbacks
{
    int totalTest;
    bool calltime = true;
    int loop = 0;
    string hasil;
    string hasil_string;
    string[] hasil_array;
    string coba;
    string coba2;
    public void RunStarted(ITestAdaptor testsToRun)
    {

    }

    public void RunFinished(ITestResultAdaptor result)
    {
        Modul1 modul1 = new Modul1();
        if (calltime)
        {
            totalTest = result.FailCount + result.PassCount;
            Debug.Log("Total Test: " + totalTest);
            Debug.Log(string.Format("Run finished {0} test(s) failed.", result.FailCount));
            Debug.Log(string.Format("Run finished {0} test(s) Passed.", result.PassCount));

            Debug.Log(modul1.nim);
            // UnityEngine.Object.DestroyImmediate(testObject);

            Debug.Log("Run Finished " + hasil_string + " length: " + hasil_array.Length);
            Debug.Log("ARRAY: " + hasil_array[0]);

            string[] dist = hasil_array.Distinct().ToArray();
            hasil = "";
            for (int i = 0; i < dist.Length; i++)
            {
                hasil += dist[i] + " ";
            }
            hasil_string = "";

            Insert(modul1.nim, totalTest, result.PassCount, result.FailCount, hasil);

            calltime = false;
        }
    }

    public void TestStarted(ITestAdaptor test)
    {

    }

    public void TestFinished(ITestResultAdaptor result)
    {
        if (!result.HasChildren && result.ResultState != "Passed")
        {
            Debug.Log(string.Format("Test {0} {1}", result.Test.Name, result.ResultState));
        }
        else if (!result.HasChildren && result.ResultState != "Failed")
        {
            Debug.Log(string.Format("Test {0} {1}", result.Test.Name, result.ResultState));
        }

        if (!result.HasChildren)
        {
            hasil = result.Test.ParentFullName;
            int index = hasil.IndexOf(".");
            if (index >= 0)
            {
                hasil = hasil.Substring(0, index);
            }
            Debug.Log("Angka " + loop + " :" + hasil);
            loop++;
        }
        hasil_array = new string[loop + 1];

        for (int i = 0; i < hasil_array.Length; i++)
        {
            hasil_array[i] = hasil;
            hasil_string += hasil + " ";
        }
        Debug.Log("AAAAAAAAa: " + hasil_array.Length);
        Debug.Log("DUMMY: " + hasil_array[0]);
        Debug.Log("DUMMY: " + hasil_array[1]);
        Debug.Log("String: " + hasil_string);

        hasil_array = hasil_string.Split(" ");
    }

    private void Insert(int nim, int result, int pass, int failed, string namaClass)
    {
        WWWForm form = new WWWForm();
        form.AddField("total_test", result);
        form.AddField("test_passed", pass);
        form.AddField("test_failed", failed);
        form.AddField("nim", nim);
        form.AddField("namaClass", namaClass);
        UnityWebRequest www = UnityWebRequest.Post("http://localhost/unitysql/register.php", form);
        www.SendWebRequest();
    }

    // string addLink = link +  "?total_test=" + result + "&test_passed=" + pass + "&test_failed=" + failed; 
    // WWW www = new WWW(addLink);
}

// IEnumerator Register(ITestResultAdaptor result)
// {
//     // Register Example
//     WWWForm form = new WWWForm();
//     form.AddField("total_test", totalTest);
//     form.AddField("test_passed", result.PassCount);
//     form.AddField("test_failed", result.FailCount);
//     UnityWebRequest www = UnityWebRequest.Post("http://localhost/unitysql/register.php", form);
//     yield return www.SendWebRequest();

//     if (www.result != UnityWebRequest.Result.Success)
//     {
//         Debug.Log(www.error);
//     }
//     else 
//     {
//         Debug.Log("Form upload complete!");
//     }
// }


