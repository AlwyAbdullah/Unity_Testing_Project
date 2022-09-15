using System;
using System.Reflection;
using System.Collections;
using System.Collections.Generic;
using NUnit.Framework;
using UnityEngine;
using UnityEngine.TestTools;
using System.IO;
using UnityEditor.TestTools;
using UnityEditor.TestTools.TestRunner;
using UnityEditor.TestTools.TestRunner.Api;
using UnityEngine.TestTools.Constraints;
using UnityEngine.TestTools.Utils;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class Modul9Test
{
    bool a = true;

    [Test]
    public void PipeTest()
    {
        GameObject testObject = MonoBehaviour.Instantiate(Resources.Load<GameObject>("Pipe"));
        Modul9 pipe = testObject.GetComponent<Modul9>();

        testObject.transform.position = Vector2.MoveTowards(testObject.transform.position, testObject.transform.right * 300, Time.deltaTime * -2);
        Debug.Log(testObject.transform.position);
        string x = testObject.transform.position.ToString();

        // string x = movements.rb.velocity.ToString();
        Debug.Log("Before Move: " + x);

        pipe.MovePipe();
        pipe.MovePipe();
        x = testObject.transform.position.ToString();

        Debug.Log("After Move: " +x);

        Assert.AreEqual("(-0.21, 3.77, 0.00)", x);
    }

    [SetUp]
    public void SetupListeners()
    {
        if (a)
        {
            var api = ScriptableObject.CreateInstance<TestRunnerApi>();
            api.RegisterCallbacks(new Callback());

            a = false;
        }
    }
}
